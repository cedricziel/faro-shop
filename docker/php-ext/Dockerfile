FROM php:8.3.0-fpm-alpine AS php_upstream
FROM mlocati/php-extension-installer:2 AS php_extension_installer_upstream

FROM php_upstream as grpc-extension-build

# persistent / runtime deps
# hadolint ignore=DL3018
RUN apk add --no-cache \
        acl \
        fcgi \
        file \
        gettext \
        git \
    ;

# php extensions installer: https://github.com/mlocati/docker-php-extension-installer
COPY --from=php_extension_installer_upstream --link /usr/bin/install-php-extensions /usr/local/bin/

ARG grpc_version

RUN set -eux; \
    install-php-extensions \
        grpc-$grpc_version \
    ;

FROM php_upstream as protobuf-extension-build

# persistent / runtime deps
# hadolint ignore=DL3018
RUN apk add --no-cache \
        acl \
        fcgi \
        file \
        gettext \
        git \
        protobuf \
    ;

# php extensions installer: https://github.com/mlocati/docker-php-extension-installer
COPY --from=php_extension_installer_upstream --link /usr/bin/install-php-extensions /usr/local/bin/

ARG protobuf_version

RUN set -eux; \
    install-php-extensions \
        protobuf-$protobuf_version \
    ;

FROM scratch as ext-grpc

COPY --from=grpc-extension-build /usr/local/lib/php/extensions/no-debug-non-zts-20230831/grpc.so /

FROM scratch as ext-protobuf

COPY --from=protobuf-extension-build /usr/local/lib/php/extensions/no-debug-non-zts-20230831/protobuf.so /
