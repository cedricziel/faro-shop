#syntax=docker/dockerfile:1.4

FROM php:8.3.12-fpm-alpine AS php_upstream
FROM ghcr.io/cedricziel/faro-shop-php:8.4.6 AS php_base_image
FROM mlocati/php-extension-installer:2 AS php_extension_installer_upstream
FROM composer/composer:2-bin AS composer_upstream
FROM --platform=$BUILDPLATFORM caddy:2.8.4-alpine AS caddy_upstream

# Base PHP image
FROM php_upstream AS php_base

WORKDIR /srv/app

# persistent / runtime deps
# hadolint ignore=DL3018
RUN apk add --no-cache \
        acl \
        fcgi \
        file \
        gettext \
        git \
        rabbitmq-c-dev \
    ;

# php extensions installer: https://github.com/mlocati/docker-php-extension-installer
COPY --from=php_extension_installer_upstream --link /usr/bin/install-php-extensions /usr/local/bin/

RUN set -eux; \
    install-php-extensions \
        apcu \
        intl \
        opcache \
        pdo \
        pdo_pgsql \
        protobuf \
        zip \
        amqp \
        opentelemetry-^1.1 \
    ;

COPY --link docker/php/conf.d/app.ini $PHP_INI_DIR/conf.d/

COPY --link docker/php/php-fpm.d/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
RUN mkdir -p /var/run/php

COPY --link --chmod=755 docker/php/docker-healthcheck.sh /usr/local/bin/docker-healthcheck
HEALTHCHECK --start-period=1m CMD docker-healthcheck

COPY --link --chmod=755 docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]

# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV PATH="${PATH}:/root/.composer/vendor/bin"

COPY --from=composer_upstream --link /composer /usr/bin/composer

# Dev PHP image
FROM php_base_image AS php_dev

WORKDIR /srv/app

ENV APP_ENV=dev XDEBUG_MODE=off
VOLUME /srv/app/var/

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN set -eux; \
	install-php-extensions \
    	xdebug \
    ;

COPY --link docker/php/conf.d/app.dev.ini $PHP_INI_DIR/conf.d/

# Prod PHP image
FROM php_base_image AS php_prod

WORKDIR /srv/app

ENV APP_ENV=prod

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY --link docker/php/conf.d/app.prod.ini $PHP_INI_DIR/conf.d/

# prevent the reinstallation of vendors at every changes in the source code
COPY --link composer.* symfony.* ./
RUN set -eux; \
	composer install --no-cache --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress

# copy sources
COPY --link . ./
RUN rm -Rf docker/

RUN set -eux; \
	mkdir -p var/cache var/log; \
	composer dump-autoload --classmap-authoritative --no-dev; \
	composer dump-env prod; \
	composer run-script --no-dev post-install-cmd; \
	chmod +x bin/console; sync;

# Base Caddy image
FROM caddy_upstream AS caddy_base

ARG TARGETARCH

WORKDIR /srv/app

# Download Caddy compiled with the Mercure and Vulcain modules
ADD --chmod=500 https://caddyserver.com/api/download?os=linux&arch=$TARGETARCH&p=github.com/dunglas/mercure/caddy&p=github.com/dunglas/vulcain/caddy /usr/bin/caddy

COPY --link docker/caddy/Caddyfile /etc/caddy/Caddyfile
HEALTHCHECK CMD wget --no-verbose --tries=1 --spider http://localhost:2019/metrics -O - || exit 1

# Prod Caddy image
FROM caddy_base AS caddy_prod

COPY --from=php_prod --link /srv/app/public public/
