# Changelog

## [0.5.1](https://github.com/cedricziel/faro-shop/compare/v0.5.0...v0.5.1) (2024-01-23)


### Bug Fixes

* bump core-js from 3.35.0 to 3.35.1 ([#206](https://github.com/cedricziel/faro-shop/issues/206)) ([4630d23](https://github.com/cedricziel/faro-shop/commit/4630d23be76e4a64d7e87c5f4c7d71c7c6bbe678))
* bump php from 8.3.1-fpm-alpine to 8.3.2-fpm-alpine ([#203](https://github.com/cedricziel/faro-shop/issues/203)) ([828ee65](https://github.com/cedricziel/faro-shop/commit/828ee6546fc5456c776c475ba463f54843593294))
* prevent default correctly ([#207](https://github.com/cedricziel/faro-shop/issues/207)) ([065629d](https://github.com/cedricziel/faro-shop/commit/065629d5fc1c3c4c59a041928e84a6cfe9003961))

## [0.5.0](https://github.com/cedricziel/faro-shop/compare/v0.4.0...v0.5.0) (2024-01-22)


### Features

* Encapsulate transaction in span ([#201](https://github.com/cedricziel/faro-shop/issues/201)) ([dc511c8](https://github.com/cedricziel/faro-shop/commit/dc511c8359eb379732d925af1533c8a747fa83e8))

## [0.4.0](https://github.com/cedricziel/faro-shop/compare/v0.3.1...v0.4.0) (2024-01-19)


### Features

* add controller for checkout and control behavior async ([ea3a977](https://github.com/cedricziel/faro-shop/commit/ea3a9770b4f171cb2155536300c6bb866c97b444))
* extend demo ([#200](https://github.com/cedricziel/faro-shop/issues/200)) ([ea3a977](https://github.com/cedricziel/faro-shop/commit/ea3a9770b4f171cb2155536300c6bb866c97b444))


### Bug Fixes

* bump the github-actions group with 1 update ([#193](https://github.com/cedricziel/faro-shop/issues/193)) ([84a5698](https://github.com/cedricziel/faro-shop/commit/84a56987bb93a6b1259a48243d195e57c70e8bdf))
* Bump webpack-cli from 4.10.0 to 5.1.4 ([#46](https://github.com/cedricziel/faro-shop/issues/46)) ([e77129e](https://github.com/cedricziel/faro-shop/commit/e77129e2d4e633bb4d705e2a906614918a6a4c12))
* k6 should wait for checkout to succeed or fail ([#198](https://github.com/cedricziel/faro-shop/issues/198)) ([9f4f352](https://github.com/cedricziel/faro-shop/commit/9f4f352dfa94618f36327f5f0882944b244f2338))

## [0.3.1](https://github.com/cedricziel/faro-shop/compare/v0.3.0...v0.3.1) (2024-01-19)


### Bug Fixes

* bump @grafana/faro-instrumentation-xhr from 1.3.5 to 1.3.6 ([#190](https://github.com/cedricziel/faro-shop/issues/190)) ([ff445dd](https://github.com/cedricziel/faro-shop/commit/ff445dde9e428903f6ee1a26d7b8b5bcb1c359e2))
* bump doctrine/orm from 2.17.2 to 2.17.3 ([#194](https://github.com/cedricziel/faro-shop/issues/194)) ([6bcf8e2](https://github.com/cedricziel/faro-shop/commit/6bcf8e298336153202eab3e3214cf7fa72f9b8cb))
* bump the open-telemetry group with 1 update ([#191](https://github.com/cedricziel/faro-shop/issues/191)) ([865afc0](https://github.com/cedricziel/faro-shop/commit/865afc0107295ac679f699ffb19a9ccf977c9545))
* initialize faro directly ([#192](https://github.com/cedricziel/faro-shop/issues/192)) ([a30500d](https://github.com/cedricziel/faro-shop/commit/a30500d14fb1433e9cd34039071a604cfc2b8bb8))
* pin opentelemetry dependency to solve build issue ([#195](https://github.com/cedricziel/faro-shop/issues/195)) ([312a0e5](https://github.com/cedricziel/faro-shop/commit/312a0e5176816a3e255186c1a2f11a59ca690722))

## [0.3.0](https://github.com/cedricziel/faro-shop/compare/v0.2.1...v0.3.0) (2024-01-16)


### Features

* Enable Performance instrumentation ([#187](https://github.com/cedricziel/faro-shop/issues/187)) ([0a6ecf8](https://github.com/cedricziel/faro-shop/commit/0a6ecf85a0116e40b4bff13c4ef9a3c052c244e2))
* reenable tracing instrumentation ([#188](https://github.com/cedricziel/faro-shop/issues/188)) ([0a79704](https://github.com/cedricziel/faro-shop/commit/0a79704af4f2167b2d2132fc87d11f123cb37f41))

## [0.2.1](https://github.com/cedricziel/faro-shop/compare/v0.2.0...v0.2.1) (2024-01-15)


### Bug Fixes

* bump @grafana/faro-instrumentation-fetch from 1.3.5 to 1.3.6 ([#182](https://github.com/cedricziel/faro-shop/issues/182)) ([9d1eeb1](https://github.com/cedricziel/faro-shop/commit/9d1eeb1b2138b36c7a30a1826f5e6c7f934dccbe))
* bump @grafana/faro-instrumentation-performance-timeline from 1.3.5 to 1.3.6 ([#183](https://github.com/cedricziel/faro-shop/issues/183)) ([aa6e41c](https://github.com/cedricziel/faro-shop/commit/aa6e41c0d16e7d47a8cf06d335f032e2b826adc2))
* bump @grafana/faro-web-tracing from 1.3.5 to 1.3.6 ([#184](https://github.com/cedricziel/faro-shop/issues/184)) ([8d67f05](https://github.com/cedricziel/faro-shop/commit/8d67f059ef48c571a849169fbd54911f625d0b0c))
* Correct k6 selector used ([#180](https://github.com/cedricziel/faro-shop/issues/180)) ([3721fe7](https://github.com/cedricziel/faro-shop/commit/3721fe70221ec904c7464277481373c127d3c578))

## [0.2.0](https://github.com/cedricziel/faro-shop/compare/v0.1.2...v0.2.0) (2024-01-13)


### Features

* Emit some telemtry on checkout ([#178](https://github.com/cedricziel/faro-shop/issues/178)) ([f1a08de](https://github.com/cedricziel/faro-shop/commit/f1a08de97f3373924f47c2c7e5537d93b64c49cf))

## [0.1.2](https://github.com/cedricziel/faro-shop/compare/v0.1.1...v0.1.2) (2024-01-13)


### Bug Fixes

* Allow fixtures bundle in production ([#173](https://github.com/cedricziel/faro-shop/issues/173)) ([69a28db](https://github.com/cedricziel/faro-shop/commit/69a28db3399d13e22036b727131ed487eba9b8ed))
* Allow fixtures bundle in production ([#175](https://github.com/cedricziel/faro-shop/issues/175)) ([9bef726](https://github.com/cedricziel/faro-shop/commit/9bef726e11cb9963511fb8a80686ef6bc63e8237))
* Dont create dynamic property ([#177](https://github.com/cedricziel/faro-shop/issues/177)) ([b1d8247](https://github.com/cedricziel/faro-shop/commit/b1d8247e1738411fee6f042a6e3b586da07449f0))
* Set environment variables for faro and loadgen ([#176](https://github.com/cedricziel/faro-shop/issues/176)) ([588fe7e](https://github.com/cedricziel/faro-shop/commit/588fe7e192a29f706a1296faa283d6d08db0cf1b))

## [0.1.1](https://github.com/cedricziel/faro-shop/compare/v0.1.0...v0.1.1) (2024-01-12)


### Bug Fixes

* bump otel/opentelemetry-collector-contrib from 0.91.0 to 0.92.0 in /docker/otelcol ([#166](https://github.com/cedricziel/faro-shop/issues/166)) ([599c3f3](https://github.com/cedricziel/faro-shop/commit/599c3f3b919d6d75eed422567e21865269a27244))
* dont include v in tag ([#164](https://github.com/cedricziel/faro-shop/issues/164)) ([55f0241](https://github.com/cedricziel/faro-shop/commit/55f02419a1728fb95a7ee262e1d0dc387b412c10))
* resolve FARO_URL instead of pinning it at compile time ([#167](https://github.com/cedricziel/faro-shop/issues/167)) ([8df51ee](https://github.com/cedricziel/faro-shop/commit/8df51ee5d9ad3da3815ca081744d7c6d89580a84))
* Set backend service name & deployment.environment ([#170](https://github.com/cedricziel/faro-shop/issues/170)) ([63e7611](https://github.com/cedricziel/faro-shop/commit/63e7611d0625f260d80d7e31304ca7013e4671ff))
* Set correct service name for frontend ([#171](https://github.com/cedricziel/faro-shop/issues/171)) ([09a1d33](https://github.com/cedricziel/faro-shop/commit/09a1d33c5a0f56cf86243c13a9f244f3bbb6ff71))

## [0.1.0](https://github.com/cedricziel/faro-shop/compare/v0.0.101...v0.1.0) (2024-01-10)


### Features

* Enhance scenario ([#150](https://github.com/cedricziel/faro-shop/issues/150)) ([f841a48](https://github.com/cedricziel/faro-shop/commit/f841a487bf18ee145de714d6b02167e413d525ad))


### Bug Fixes

* Bump the open-telemetry group with 1 update ([#159](https://github.com/cedricziel/faro-shop/issues/159)) ([66c8e49](https://github.com/cedricziel/faro-shop/commit/66c8e49485018270560f8ad9288642a34c6c2e07))

## [0.0.101](https://github.com/cedricziel/faro-shop/compare/v0.0.100...v0.0.101) (2024-01-10)


### Bug Fixes

* Dont depend on version step ([#157](https://github.com/cedricziel/faro-shop/issues/157)) ([a6a4ffb](https://github.com/cedricziel/faro-shop/commit/a6a4ffb9f71697394f81424813698c280b6022ce))

## [0.0.100](https://github.com/cedricziel/faro-shop/compare/v0.0.99...v0.0.100) (2024-01-10)


### Bug Fixes

* Rely on tag name for releases ([#155](https://github.com/cedricziel/faro-shop/issues/155)) ([5efaef3](https://github.com/cedricziel/faro-shop/commit/5efaef36d840844ee0281c8758ac3fa9d58610f6))

## [0.0.99](https://github.com/cedricziel/faro-shop/compare/v0.0.98...v0.0.99) (2024-01-10)


### Bug Fixes

* Dont depend on lint ([#153](https://github.com/cedricziel/faro-shop/issues/153)) ([78aeb6f](https://github.com/cedricziel/faro-shop/commit/78aeb6f409395bd85583d7d92f8cf1c5b836df25))

## [0.0.98](https://github.com/cedricziel/faro-shop/compare/0.0.97...v0.0.98) (2024-01-10)


### Bug Fixes

* Switch to protobuf ([#149](https://github.com/cedricziel/faro-shop/issues/149)) ([c43383b](https://github.com/cedricziel/faro-shop/commit/c43383bd32d5c816ca321d22b0b24b665256a163))
