# Changelog

## [0.11.0](https://github.com/cedricziel/faro-shop/compare/0.10.0...0.11.0) (2024-06-23)


### Features

* add add amqp-messenger ([#405](https://github.com/cedricziel/faro-shop/issues/405)) ([41baa72](https://github.com/cedricziel/faro-shop/commit/41baa72e55fb99cc3978c422df4cc868fca74604))

## [0.10.0](https://github.com/cedricziel/faro-shop/compare/0.9.0...0.10.0) (2024-06-23)


### Features

* add ext-amqp ([#402](https://github.com/cedricziel/faro-shop/issues/402)) ([0ae882f](https://github.com/cedricziel/faro-shop/commit/0ae882ffc80b8ba4ff34b423819d3b7e5ee5aa39))
* add service.version ([#403](https://github.com/cedricziel/faro-shop/issues/403)) ([2fc7b30](https://github.com/cedricziel/faro-shop/commit/2fc7b3000e13016962f82e8f12d3456a8d126f19))

## [0.9.0](https://github.com/cedricziel/faro-shop/compare/0.8.1...0.9.0) (2024-06-23)


### Features

* introduce service namespace for faro ([#399](https://github.com/cedricziel/faro-shop/issues/399)) ([9991378](https://github.com/cedricziel/faro-shop/commit/9991378040cef33f0ec519916ea2e8c8fce53361))

## [0.8.1](https://github.com/cedricziel/faro-shop/compare/0.8.0...0.8.1) (2024-06-23)


### Bug Fixes

* Distinguish app && worker ([#396](https://github.com/cedricziel/faro-shop/issues/396)) ([1eb5d58](https://github.com/cedricziel/faro-shop/commit/1eb5d5811485c4682dde2f9fe479d70184bd9d0f))

## [0.8.0](https://github.com/cedricziel/faro-shop/compare/0.7.1...0.8.0) (2024-06-23)


### Features

* fail server transactions ([#392](https://github.com/cedricziel/faro-shop/issues/392)) ([055897a](https://github.com/cedricziel/faro-shop/commit/055897a13671f693dfa62fb804577d47096bd7f0))
* Introduce worker to consume messages ([#395](https://github.com/cedricziel/faro-shop/issues/395)) ([49bb0ba](https://github.com/cedricziel/faro-shop/commit/49bb0ba53df124e84524631b9717ed4132117dad))
* SourceMap upload ([#394](https://github.com/cedricziel/faro-shop/issues/394)) ([dc5de18](https://github.com/cedricziel/faro-shop/commit/dc5de186288ec96792a755a8e54b73a59b907951))

## [0.7.1](https://github.com/cedricziel/faro-shop/compare/0.7.0...0.7.1) (2024-06-22)


### Bug Fixes

* dont release chart before building images ([#390](https://github.com/cedricziel/faro-shop/issues/390)) ([b0a3abd](https://github.com/cedricziel/faro-shop/commit/b0a3abd1ae414ce3547ad1089680f66f2c4ebc25))

## [0.7.0](https://github.com/cedricziel/faro-shop/compare/v0.6.1...0.7.0) (2024-06-22)


### Features

* add controller for checkout and control behavior async ([ea3a977](https://github.com/cedricziel/faro-shop/commit/ea3a9770b4f171cb2155536300c6bb866c97b444))
* Add helm chart ([#377](https://github.com/cedricziel/faro-shop/issues/377)) ([1853e9d](https://github.com/cedricziel/faro-shop/commit/1853e9d3968c54c4ea66c45d4a86638095137585))
* Emit some telemtry on checkout ([#178](https://github.com/cedricziel/faro-shop/issues/178)) ([f1a08de](https://github.com/cedricziel/faro-shop/commit/f1a08de97f3373924f47c2c7e5537d93b64c49cf))
* Enable Performance instrumentation ([#187](https://github.com/cedricziel/faro-shop/issues/187)) ([0a6ecf8](https://github.com/cedricziel/faro-shop/commit/0a6ecf85a0116e40b4bff13c4ef9a3c052c244e2))
* enable tracing in caddy ([#383](https://github.com/cedricziel/faro-shop/issues/383)) ([d991ed6](https://github.com/cedricziel/faro-shop/commit/d991ed6fb86a38a5c04d73d643c9e3381213843d))
* Encapsulate transaction in span ([#201](https://github.com/cedricziel/faro-shop/issues/201)) ([dc511c8](https://github.com/cedricziel/faro-shop/commit/dc511c8359eb379732d925af1533c8a747fa83e8))
* Enhance scenario ([#150](https://github.com/cedricziel/faro-shop/issues/150)) ([f841a48](https://github.com/cedricziel/faro-shop/commit/f841a487bf18ee145de714d6b02167e413d525ad))
* extend demo ([#200](https://github.com/cedricziel/faro-shop/issues/200)) ([ea3a977](https://github.com/cedricziel/faro-shop/commit/ea3a9770b4f171cb2155536300c6bb866c97b444))
* reenable tracing instrumentation ([#188](https://github.com/cedricziel/faro-shop/issues/188)) ([0a79704](https://github.com/cedricziel/faro-shop/commit/0a79704af4f2167b2d2132fc87d11f123cb37f41))


### Bug Fixes

* Allow fixtures bundle in production ([#173](https://github.com/cedricziel/faro-shop/issues/173)) ([69a28db](https://github.com/cedricziel/faro-shop/commit/69a28db3399d13e22036b727131ed487eba9b8ed))
* Allow fixtures bundle in production ([#175](https://github.com/cedricziel/faro-shop/issues/175)) ([9bef726](https://github.com/cedricziel/faro-shop/commit/9bef726e11cb9963511fb8a80686ef6bc63e8237))
* build custom caddy version to inject client spans ([#385](https://github.com/cedricziel/faro-shop/issues/385)) ([b108ca9](https://github.com/cedricziel/faro-shop/commit/b108ca96bd9ec32910ac83e1b0417bdbce53e88c))
* bump @babel/core from 7.23.7 to 7.23.9 ([#217](https://github.com/cedricziel/faro-shop/issues/217)) ([725de12](https://github.com/cedricziel/faro-shop/commit/725de12df86088bdc08cfde9e1eb791d272826f9))
* bump @babel/core from 7.23.9 to 7.24.0 ([#262](https://github.com/cedricziel/faro-shop/issues/262)) ([e8deab1](https://github.com/cedricziel/faro-shop/commit/e8deab14e1dddb5886365e6b1ca9c19505e4b4c3))
* bump @babel/core from 7.24.0 to 7.24.1 ([#281](https://github.com/cedricziel/faro-shop/issues/281)) ([7710d5f](https://github.com/cedricziel/faro-shop/commit/7710d5fb983cdebb2d37c848dca599e82eacedae))
* bump @babel/core from 7.24.1 to 7.24.3 ([#283](https://github.com/cedricziel/faro-shop/issues/283)) ([4439ea0](https://github.com/cedricziel/faro-shop/commit/4439ea0c65a0ebbc60a9bbedf322ebff20066bee))
* bump @babel/core from 7.24.3 to 7.24.4 ([#299](https://github.com/cedricziel/faro-shop/issues/299)) ([7871f73](https://github.com/cedricziel/faro-shop/commit/7871f73c035ea7a0b7a0317f33b0dbfc67c898b6))
* bump @babel/core from 7.24.4 to 7.24.5 ([#320](https://github.com/cedricziel/faro-shop/issues/320)) ([e414a29](https://github.com/cedricziel/faro-shop/commit/e414a29b2f9e8914ec68a28c3575f43acd8280f2))
* bump @babel/core from 7.24.5 to 7.24.6 ([#344](https://github.com/cedricziel/faro-shop/issues/344)) ([9cb56c1](https://github.com/cedricziel/faro-shop/commit/9cb56c1a8367751c6eac5c06f4b13ef4858c6dc2))
* bump @babel/core from 7.24.6 to 7.24.7 ([#361](https://github.com/cedricziel/faro-shop/issues/361)) ([59ea28d](https://github.com/cedricziel/faro-shop/commit/59ea28d6167d30fcf8554d41890611fb2ca63082))
* bump @babel/preset-env from 7.23.8 to 7.23.9 ([#215](https://github.com/cedricziel/faro-shop/issues/215)) ([9c23e83](https://github.com/cedricziel/faro-shop/commit/9c23e83147e5bda66dd96deb25f46bbeb782ce2e))
* bump @babel/preset-env from 7.23.9 to 7.24.0 ([#261](https://github.com/cedricziel/faro-shop/issues/261)) ([d39fae1](https://github.com/cedricziel/faro-shop/commit/d39fae1b7b3b8b7090d44cb1f98b0bc7905327ce))
* bump @babel/preset-env from 7.24.0 to 7.24.1 ([#282](https://github.com/cedricziel/faro-shop/issues/282)) ([deb159e](https://github.com/cedricziel/faro-shop/commit/deb159e9cd330d5f01d95724d005cf2abb267090))
* bump @babel/preset-env from 7.24.1 to 7.24.3 ([#284](https://github.com/cedricziel/faro-shop/issues/284)) ([6f1fa6a](https://github.com/cedricziel/faro-shop/commit/6f1fa6a06e522aa3d523d0426e307aea1b0fc192))
* bump @babel/preset-env from 7.24.3 to 7.24.4 ([#300](https://github.com/cedricziel/faro-shop/issues/300)) ([8c78823](https://github.com/cedricziel/faro-shop/commit/8c7882361654b019fe6e215d37084b16d8f2e5fd))
* bump @babel/preset-env from 7.24.4 to 7.24.5 ([#319](https://github.com/cedricziel/faro-shop/issues/319)) ([4d1da88](https://github.com/cedricziel/faro-shop/commit/4d1da88e4ed0867a5094f9610ac95ca79e4d15a6))
* bump @babel/preset-env from 7.24.5 to 7.24.6 ([#345](https://github.com/cedricziel/faro-shop/issues/345)) ([190f927](https://github.com/cedricziel/faro-shop/commit/190f927ba75b27ea92ef72aa87a4cdf23e1e220c))
* bump @babel/preset-env from 7.24.6 to 7.24.7 ([#362](https://github.com/cedricziel/faro-shop/issues/362)) ([2496e44](https://github.com/cedricziel/faro-shop/commit/2496e4463451287e987bc94747b08cafc067ea67))
* bump @grafana/faro-instrumentation-fetch from 1.3.5 to 1.3.6 ([#182](https://github.com/cedricziel/faro-shop/issues/182)) ([9d1eeb1](https://github.com/cedricziel/faro-shop/commit/9d1eeb1b2138b36c7a30a1826f5e6c7f934dccbe))
* bump @grafana/faro-instrumentation-performance-timeline from 1.3.5 to 1.3.6 ([#183](https://github.com/cedricziel/faro-shop/issues/183)) ([aa6e41c](https://github.com/cedricziel/faro-shop/commit/aa6e41c0d16e7d47a8cf06d335f032e2b826adc2))
* bump @grafana/faro-instrumentation-xhr from 1.3.5 to 1.3.6 ([#190](https://github.com/cedricziel/faro-shop/issues/190)) ([ff445dd](https://github.com/cedricziel/faro-shop/commit/ff445dde9e428903f6ee1a26d7b8b5bcb1c359e2))
* bump @grafana/faro-web-tracing from 1.3.5 to 1.3.6 ([#184](https://github.com/cedricziel/faro-shop/issues/184)) ([8d67f05](https://github.com/cedricziel/faro-shop/commit/8d67f059ef48c571a849169fbd54911f625d0b0c))
* bump @symfony/webpack-encore from 4.5.0 to 4.6.1 ([#216](https://github.com/cedricziel/faro-shop/issues/216)) ([3eba699](https://github.com/cedricziel/faro-shop/commit/3eba699df6a25430248531697000d1b45116348a))
* bump core-js from 3.35.0 to 3.35.1 ([#206](https://github.com/cedricziel/faro-shop/issues/206)) ([4630d23](https://github.com/cedricziel/faro-shop/commit/4630d23be76e4a64d7e87c5f4c7d71c7c6bbe678))
* bump core-js from 3.35.1 to 3.36.0 ([#240](https://github.com/cedricziel/faro-shop/issues/240)) ([0e1cd46](https://github.com/cedricziel/faro-shop/commit/0e1cd46e5c6be5f33e065a451a8369608627cb35))
* bump core-js from 3.36.0 to 3.36.1 ([#280](https://github.com/cedricziel/faro-shop/issues/280)) ([9e492e8](https://github.com/cedricziel/faro-shop/commit/9e492e826c6e035e9ae5d9b0c47024d01674c1ee))
* bump core-js from 3.36.1 to 3.37.0 ([#310](https://github.com/cedricziel/faro-shop/issues/310)) ([e4f36cb](https://github.com/cedricziel/faro-shop/commit/e4f36cbd24597285cc6544a620b895f79189044b))
* bump core-js from 3.37.0 to 3.37.1 ([#335](https://github.com/cedricziel/faro-shop/issues/335)) ([6a9610b](https://github.com/cedricziel/faro-shop/commit/6a9610b41db73e60ff46ca28d63b1a2ed62cd156))
* bump dbrekelmans/bdi from 1.1.0 to 1.1.1 ([#243](https://github.com/cedricziel/faro-shop/issues/243)) ([4c3fb8d](https://github.com/cedricziel/faro-shop/commit/4c3fb8dc585ca910fa09b1975fa937b4f8cd4e5b))
* bump dbrekelmans/bdi from 1.1.1 to 1.2.0 ([#247](https://github.com/cedricziel/faro-shop/issues/247)) ([d67a259](https://github.com/cedricziel/faro-shop/commit/d67a2594e880aada780f8afe15f5090fe9005d2f))
* bump dbrekelmans/bdi from 1.2.0 to 1.3.0 ([#255](https://github.com/cedricziel/faro-shop/issues/255)) ([f8af85e](https://github.com/cedricziel/faro-shop/commit/f8af85ecc8731da9263a329dfee08066932a89b4))
* bump dependabot/fetch-metadata from 1 to 2 ([#291](https://github.com/cedricziel/faro-shop/issues/291)) ([680b570](https://github.com/cedricziel/faro-shop/commit/680b570444b20346cb4db22fe94246d7d42be622))
* bump docker/build-push-action from 5 to 6 ([#373](https://github.com/cedricziel/faro-shop/issues/373)) ([14d89ac](https://github.com/cedricziel/faro-shop/commit/14d89ac117024f83ef1d7a4e7949d38255fe84ee))
* bump doctrine/doctrine-bundle from 2.11.1 to 2.11.2 ([#233](https://github.com/cedricziel/faro-shop/issues/233)) ([d985be5](https://github.com/cedricziel/faro-shop/commit/d985be5c55ca74ea2de4a11743c5d95d24a15ad8))
* bump doctrine/doctrine-bundle from 2.11.2 to 2.11.3 ([#239](https://github.com/cedricziel/faro-shop/issues/239)) ([a477229](https://github.com/cedricziel/faro-shop/commit/a477229be2e6e3767c4f1355838e6449a6a56c34))
* bump doctrine/doctrine-bundle from 2.11.3 to 2.12.0 ([#278](https://github.com/cedricziel/faro-shop/issues/278)) ([d698fcc](https://github.com/cedricziel/faro-shop/commit/d698fccbae07f4dfc23be6fce12d3d131f5c8433))
* bump doctrine/doctrine-fixtures-bundle from 3.5.1 to 3.6.0 ([#324](https://github.com/cedricziel/faro-shop/issues/324)) ([42d2166](https://github.com/cedricziel/faro-shop/commit/42d2166925439bf26a4b6586dfc529964abbf2c3))
* bump doctrine/doctrine-fixtures-bundle from 3.6.0 to 3.6.1 ([#347](https://github.com/cedricziel/faro-shop/issues/347)) ([272f81c](https://github.com/cedricziel/faro-shop/commit/272f81c406df0ae9a20beb5f0d7a2ec688cd724d))
* bump doctrine/doctrine-migrations-bundle from 3.3.0 to 3.3.1 ([#336](https://github.com/cedricziel/faro-shop/issues/336)) ([a8c2a95](https://github.com/cedricziel/faro-shop/commit/a8c2a9543fe076a3b8ee8aa0bb249336769ef3bd))
* bump doctrine/orm from 2.17.2 to 2.17.3 ([#194](https://github.com/cedricziel/faro-shop/issues/194)) ([6bcf8e2](https://github.com/cedricziel/faro-shop/commit/6bcf8e298336153202eab3e3214cf7fa72f9b8cb))
* bump doctrine/orm from 2.17.3 to 2.17.4 ([#219](https://github.com/cedricziel/faro-shop/issues/219)) ([a19d596](https://github.com/cedricziel/faro-shop/commit/a19d596545aa8cb82d6d41bb89fbf88ca388abd2))
* bump doctrine/orm from 3.0.0 to 3.0.1 ([#256](https://github.com/cedricziel/faro-shop/issues/256)) ([3c1744e](https://github.com/cedricziel/faro-shop/commit/3c1744ea285936157c529d79687eac1204296995))
* bump doctrine/orm from 3.0.1 to 3.0.2 ([#266](https://github.com/cedricziel/faro-shop/issues/266)) ([24cfc2a](https://github.com/cedricziel/faro-shop/commit/24cfc2a4642167632bd76cd65a0a4e7fc0aede31))
* bump doctrine/orm from 3.0.2 to 3.1.0 ([#270](https://github.com/cedricziel/faro-shop/issues/270)) ([272ce11](https://github.com/cedricziel/faro-shop/commit/272ce1123d9abbae689b7e91f87df34e73e53a2e))
* bump doctrine/orm from 3.1.0 to 3.1.1 ([#290](https://github.com/cedricziel/faro-shop/issues/290)) ([c24f8a8](https://github.com/cedricziel/faro-shop/commit/c24f8a8de03a5e0cfe8a282aaebd9dcdc69aafdd))
* bump doctrine/orm from 3.1.1 to 3.1.2 ([#308](https://github.com/cedricziel/faro-shop/issues/308)) ([1c28e78](https://github.com/cedricziel/faro-shop/commit/1c28e78f5bf539a8295132760674ee00ad50a4f9))
* bump doctrine/orm from 3.1.2 to 3.1.3 ([#321](https://github.com/cedricziel/faro-shop/issues/321)) ([3ef9329](https://github.com/cedricziel/faro-shop/commit/3ef932980fac789610b206615dd2facdd50085e0))
* bump doctrine/orm from 3.1.3 to 3.2.0 ([#343](https://github.com/cedricziel/faro-shop/issues/343)) ([83f0c59](https://github.com/cedricziel/faro-shop/commit/83f0c59a328be6d9907e29a20a9ba69aa0ded2ea))
* bump google/protobuf from 3.25.2 to 3.25.3 ([#244](https://github.com/cedricziel/faro-shop/issues/244)) ([25df879](https://github.com/cedricziel/faro-shop/commit/25df879c63d5ddfba5e948e3844dab4bf075da2a))
* bump googleapis/release-please-action from 4.1.1 to 4.1.3 ([#370](https://github.com/cedricziel/faro-shop/issues/370)) ([ba3ad78](https://github.com/cedricziel/faro-shop/commit/ba3ad788758a4f194f08491e9f5f8a258cca9b51))
* bump grafana/k6 from 0.48.0-with-browser to 0.49.0-with-browser in /docker/k6 ([#220](https://github.com/cedricziel/faro-shop/issues/220)) ([0c7ca38](https://github.com/cedricziel/faro-shop/commit/0c7ca389ce2c3dd83f41ee966d7d66c6d441257b))
* bump grafana/k6 from 0.49.0-with-browser to 0.50.0-with-browser in /docker/k6 ([#292](https://github.com/cedricziel/faro-shop/issues/292)) ([8bc41df](https://github.com/cedricziel/faro-shop/commit/8bc41df5ab90fa2fa647c1f29b940bb9caa47e65))
* bump grafana/k6 from 0.50.0-with-browser to 0.51.0-with-browser in /docker/k6 ([#333](https://github.com/cedricziel/faro-shop/issues/333)) ([c13fd10](https://github.com/cedricziel/faro-shop/commit/c13fd10b8f920fdd17b733a14e323392a9c99201))
* bump open-telemetry/opentelemetry-auto-laravel from 0.0.24 to 0.0.25 in the open-telemetry group ([#316](https://github.com/cedricziel/faro-shop/issues/316)) ([6893b75](https://github.com/cedricziel/faro-shop/commit/6893b7558b3bd7f14842d27e26f76aa8100357d4))
* bump open-telemetry/opentelemetry-auto-pdo from 0.0.12 to 0.0.13 in the open-telemetry group ([#330](https://github.com/cedricziel/faro-shop/issues/330)) ([2f0831d](https://github.com/cedricziel/faro-shop/commit/2f0831d18c8c7b9770d5febe3f18fc9837bd26ae))
* bump open-telemetry/opentelemetry-auto-slim from 1.0.4 to 1.0.5 in the open-telemetry group ([#326](https://github.com/cedricziel/faro-shop/issues/326)) ([0d7fe78](https://github.com/cedricziel/faro-shop/commit/0d7fe7891eab64e299a94442309209c65abe5890))
* bump open-telemetry/opentelemetry-auto-slim from 1.0.5 to 1.0.6 in the open-telemetry group ([#339](https://github.com/cedricziel/faro-shop/issues/339)) ([f5aa39a](https://github.com/cedricziel/faro-shop/commit/f5aa39a6aea837b157f16790c781cbd5630701c6))
* bump open-telemetry/opentelemetry-auto-symfony from 1.0.0beta23 to 1.0.0beta24 in the open-telemetry group ([#323](https://github.com/cedricziel/faro-shop/issues/323)) ([e26710e](https://github.com/cedricziel/faro-shop/commit/e26710e51c87873c7e0d2491b0b154b77b22396c))
* bump open-telemetry/opentelemetry-auto-symfony from 1.0.0beta24 to 1.0.0beta25 in the open-telemetry group ([#346](https://github.com/cedricziel/faro-shop/issues/346)) ([414182a](https://github.com/cedricziel/faro-shop/commit/414182a66ccbbdbc3c70e9d0b59a1fe443a98237))
* bump otel/opentelemetry-collector-contrib from 0.100.0 to 0.101.0 in /docker/otelcol ([#342](https://github.com/cedricziel/faro-shop/issues/342)) ([5a1a3c2](https://github.com/cedricziel/faro-shop/commit/5a1a3c2741e55980a7a4edf4b17604dff7ae55a0))
* bump otel/opentelemetry-collector-contrib from 0.101.0 to 0.102.0 in /docker/otelcol ([#360](https://github.com/cedricziel/faro-shop/issues/360)) ([e21c785](https://github.com/cedricziel/faro-shop/commit/e21c78597df25344d4f6e9432bcbe0a2030db008))
* bump otel/opentelemetry-collector-contrib from 0.102.0 to 0.102.1 in /docker/otelcol ([#363](https://github.com/cedricziel/faro-shop/issues/363)) ([1de6bee](https://github.com/cedricziel/faro-shop/commit/1de6beec47936928b6dbdb746985cd3bc58f8967))
* bump otel/opentelemetry-collector-contrib from 0.102.1 to 0.103.0 in /docker/otelcol ([#378](https://github.com/cedricziel/faro-shop/issues/378)) ([a5b9ddd](https://github.com/cedricziel/faro-shop/commit/a5b9dddd7685b72c8c7b5458d04f38f09effa01c))
* bump otel/opentelemetry-collector-contrib from 0.91.0 to 0.92.0 in /docker/otelcol ([#166](https://github.com/cedricziel/faro-shop/issues/166)) ([599c3f3](https://github.com/cedricziel/faro-shop/commit/599c3f3b919d6d75eed422567e21865269a27244))
* bump otel/opentelemetry-collector-contrib from 0.92.0 to 0.93.0 in /docker/otelcol ([#218](https://github.com/cedricziel/faro-shop/issues/218)) ([a0319ed](https://github.com/cedricziel/faro-shop/commit/a0319ed046e309531605ee50e0ffd377f7caa019))
* bump otel/opentelemetry-collector-contrib from 0.93.0 to 0.95.0 in /docker/otelcol ([#250](https://github.com/cedricziel/faro-shop/issues/250)) ([b5bd7ad](https://github.com/cedricziel/faro-shop/commit/b5bd7ada6569a1b885c046c9dceed1a08a2f5c88))
* bump otel/opentelemetry-collector-contrib from 0.95.0 to 0.96.0 in /docker/otelcol ([#271](https://github.com/cedricziel/faro-shop/issues/271)) ([57adb55](https://github.com/cedricziel/faro-shop/commit/57adb554a82257558ef9e1a75cad1c49740b68a3))
* bump otel/opentelemetry-collector-contrib from 0.96.0 to 0.97.0 in /docker/otelcol ([#293](https://github.com/cedricziel/faro-shop/issues/293)) ([7cdf335](https://github.com/cedricziel/faro-shop/commit/7cdf335a5aaf4ebe00124f2512821e80ffaa624b))
* bump otel/opentelemetry-collector-contrib from 0.97.0 to 0.98.0 in /docker/otelcol ([#304](https://github.com/cedricziel/faro-shop/issues/304)) ([4eb32c0](https://github.com/cedricziel/faro-shop/commit/4eb32c0e77679adc7bf9b11cc48108bbb5e54cb8))
* bump otel/opentelemetry-collector-contrib from 0.98.0 to 0.99.0 in /docker/otelcol ([#314](https://github.com/cedricziel/faro-shop/issues/314)) ([398871f](https://github.com/cedricziel/faro-shop/commit/398871fbd991b20f5cccf1efe87d00ee2bc0d265))
* bump otel/opentelemetry-collector-contrib from 0.99.0 to 0.100.0 in /docker/otelcol ([#329](https://github.com/cedricziel/faro-shop/issues/329)) ([fb5ae71](https://github.com/cedricziel/faro-shop/commit/fb5ae71e9c4e56afce02adc66c64625e21fa21a1))
* bump php from 8.3.1-fpm-alpine to 8.3.2-fpm-alpine ([#203](https://github.com/cedricziel/faro-shop/issues/203)) ([828ee65](https://github.com/cedricziel/faro-shop/commit/828ee6546fc5456c776c475ba463f54843593294))
* bump php from 8.3.2-fpm-alpine to 8.3.3-fpm-alpine ([#245](https://github.com/cedricziel/faro-shop/issues/245)) ([6214930](https://github.com/cedricziel/faro-shop/commit/6214930a7005e5d4121b22f5dc5850c2c72042a3))
* bump php from 8.3.3-fpm-alpine to 8.3.4-fpm-alpine ([#277](https://github.com/cedricziel/faro-shop/issues/277)) ([f9fb200](https://github.com/cedricziel/faro-shop/commit/f9fb20016f431ee81e83eceac9e95b84db32d708))
* bump php from 8.3.4-fpm-alpine to 8.3.6-fpm-alpine ([#305](https://github.com/cedricziel/faro-shop/issues/305)) ([b13f8ff](https://github.com/cedricziel/faro-shop/commit/b13f8ffef61a4e9a17fc4cb199eeb921466782ab))
* bump php from 8.3.6-fpm-alpine to 8.3.7-fpm-alpine ([#334](https://github.com/cedricziel/faro-shop/issues/334)) ([1c4bfb1](https://github.com/cedricziel/faro-shop/commit/1c4bfb169ff632b2ca69b7877d46089299072e2a))
* bump php from 8.3.7-fpm-alpine to 8.3.8-fpm-alpine ([#364](https://github.com/cedricziel/faro-shop/issues/364)) ([3faa6f7](https://github.com/cedricziel/faro-shop/commit/3faa6f75c99cd5597d5efcc99758753052fc87a8))
* bump phpdocumentor/reflection-docblock from 5.3.0 to 5.4.0 ([#306](https://github.com/cedricziel/faro-shop/issues/306)) ([866bf95](https://github.com/cedricziel/faro-shop/commit/866bf951df80a9efc58a9b48767bab7f444d62e3))
* bump phpdocumentor/reflection-docblock from 5.4.0 to 5.4.1 ([#340](https://github.com/cedricziel/faro-shop/issues/340)) ([7611e59](https://github.com/cedricziel/faro-shop/commit/7611e590d5e9ac4c5b5177ee1308d7075bc2f595))
* bump phpstan/phpdoc-parser from 1.25.0 to 1.26.0 ([#257](https://github.com/cedricziel/faro-shop/issues/257)) ([a708b07](https://github.com/cedricziel/faro-shop/commit/a708b07f68016cee29e6f88cd4e309aad6bb945a))
* bump phpstan/phpdoc-parser from 1.26.0 to 1.27.0 ([#286](https://github.com/cedricziel/faro-shop/issues/286)) ([722927e](https://github.com/cedricziel/faro-shop/commit/722927e5730b9439387e3ca6de9a2f6b7ab1b830))
* bump phpstan/phpdoc-parser from 1.27.0 to 1.28.0 ([#298](https://github.com/cedricziel/faro-shop/issues/298)) ([41f8af7](https://github.com/cedricziel/faro-shop/commit/41f8af7abc6d78402b88770101e2188b01010074))
* bump phpstan/phpdoc-parser from 1.29.0 to 1.29.1 ([#358](https://github.com/cedricziel/faro-shop/issues/358)) ([a2c28da](https://github.com/cedricziel/faro-shop/commit/a2c28da306031f9eeefb304fcd9c87d5ff2e1456))
* bump phpunit/phpunit from 10.5.10 to 11.0.3 ([#254](https://github.com/cedricziel/faro-shop/issues/254)) ([b832f30](https://github.com/cedricziel/faro-shop/commit/b832f309ed84937af77a3bde7150a925cc8a5b40))
* bump phpunit/phpunit from 11.0.3 to 11.0.4 ([#267](https://github.com/cedricziel/faro-shop/issues/267)) ([eb83093](https://github.com/cedricziel/faro-shop/commit/eb8309325787bf3e6890ed4734d3efb367590f3d))
* bump phpunit/phpunit from 11.0.4 to 11.0.5 ([#275](https://github.com/cedricziel/faro-shop/issues/275)) ([31683e6](https://github.com/cedricziel/faro-shop/commit/31683e6bd15e4c13538cc964a83d4f243cfab142))
* bump phpunit/phpunit from 11.0.5 to 11.0.6 ([#276](https://github.com/cedricziel/faro-shop/issues/276)) ([bd3b7b6](https://github.com/cedricziel/faro-shop/commit/bd3b7b66b22a86ddf4c3d0e56a319d9c9f43a266))
* bump phpunit/phpunit from 11.0.6 to 11.0.7 ([#287](https://github.com/cedricziel/faro-shop/issues/287)) ([c0f04ca](https://github.com/cedricziel/faro-shop/commit/c0f04ca0a1a7604dfe35a5d349c80b24d2c20b4a))
* bump phpunit/phpunit from 11.0.7 to 11.0.8 ([#289](https://github.com/cedricziel/faro-shop/issues/289)) ([c1b2a63](https://github.com/cedricziel/faro-shop/commit/c1b2a63a5cde128a222f4c212c413d63b63a7c7b))
* bump phpunit/phpunit from 11.0.8 to 11.0.9 ([#294](https://github.com/cedricziel/faro-shop/issues/294)) ([0524955](https://github.com/cedricziel/faro-shop/commit/052495586347d9d937b0bf602a00f7ff69bbe365))
* bump phpunit/phpunit from 11.0.9 to 11.1.1 ([#303](https://github.com/cedricziel/faro-shop/issues/303)) ([392889c](https://github.com/cedricziel/faro-shop/commit/392889c55d21f468b11927da06a100ad590d399a))
* bump phpunit/phpunit from 11.1.1 to 11.1.2 ([#307](https://github.com/cedricziel/faro-shop/issues/307)) ([5b604c8](https://github.com/cedricziel/faro-shop/commit/5b604c84cd8ff4e26d4bec3a418480d3a0cb139a))
* bump phpunit/phpunit from 11.1.2 to 11.1.3 ([#315](https://github.com/cedricziel/faro-shop/issues/315)) ([24401ef](https://github.com/cedricziel/faro-shop/commit/24401ef36e4e51c83196db91e5b247a99195fa69))
* bump phpunit/phpunit from 11.1.3 to 11.2.0 ([#366](https://github.com/cedricziel/faro-shop/issues/366)) ([8d3e41c](https://github.com/cedricziel/faro-shop/commit/8d3e41c3c2839697ae4caf137a225645c7c7053d))
* bump phpunit/phpunit from 11.2.0 to 11.2.1 ([#368](https://github.com/cedricziel/faro-shop/issues/368)) ([6a6332b](https://github.com/cedricziel/faro-shop/commit/6a6332b5bbbda822d042bb7c57f4b71234b93130))
* bump phpunit/phpunit from 11.2.1 to 11.2.2 ([#372](https://github.com/cedricziel/faro-shop/issues/372)) ([effb709](https://github.com/cedricziel/faro-shop/commit/effb709e680d1f4c0e3ee147f5fd1034bab72f75))
* bump phpunit/phpunit from 11.2.2 to 11.2.3 ([#379](https://github.com/cedricziel/faro-shop/issues/379)) ([5a79a48](https://github.com/cedricziel/faro-shop/commit/5a79a486cbb16a15b443419e1529962c9e16a111))
* bump phpunit/phpunit from 11.2.3 to 11.2.5 ([#382](https://github.com/cedricziel/faro-shop/issues/382)) ([3664895](https://github.com/cedricziel/faro-shop/commit/36648951d804df03efa65b3dad8bffa4a28dc228))
* bump phpunit/phpunit from 9.6.16 to 10.5.10 ([#230](https://github.com/cedricziel/faro-shop/issues/230)) ([afa06bf](https://github.com/cedricziel/faro-shop/commit/afa06bf69fc0f2feac07204de2731d67e64148a4))
* bump symfony/maker-bundle from 1.57.0 to 1.58.0 in the symfony group ([#302](https://github.com/cedricziel/faro-shop/issues/302)) ([bc1e27d](https://github.com/cedricziel/faro-shop/commit/bc1e27d0f6f28e7613e13451ba072d47d13f19ab))
* bump symfony/maker-bundle from 1.59.0 to 1.59.1 in the symfony group ([#325](https://github.com/cedricziel/faro-shop/issues/325)) ([8e0dc17](https://github.com/cedricziel/faro-shop/commit/8e0dc174b91e637f5ee03244d332e06a62b92019))
* bump symfony/maker-bundle from 1.59.1 to 1.60.0 in the symfony group ([#367](https://github.com/cedricziel/faro-shop/issues/367)) ([c6f27c5](https://github.com/cedricziel/faro-shop/commit/c6f27c556402df279069be12cf6625671819eb20))
* bump symfony/mime from 6.4.0 to 6.4.3 ([#224](https://github.com/cedricziel/faro-shop/issues/224)) ([fa654f4](https://github.com/cedricziel/faro-shop/commit/fa654f4bcf592ffe115635bda58ea44854125227))
* bump symfony/property-info from 6.4.0 to 6.4.3 ([#225](https://github.com/cedricziel/faro-shop/issues/225)) ([c3b299f](https://github.com/cedricziel/faro-shop/commit/c3b299f96d7b9a6df8e4cf5899819e6275fe7874))
* bump symfony/stimulus-bundle from 2.16.0 to 2.17.0 in the symfony group ([#313](https://github.com/cedricziel/faro-shop/issues/313)) ([a278366](https://github.com/cedricziel/faro-shop/commit/a27836656aa49723b88859213fabca2cfa740352))
* bump symfony/stimulus-bundle from 2.17.0 to 2.18.0 in the symfony group ([#365](https://github.com/cedricziel/faro-shop/issues/365)) ([d97447a](https://github.com/cedricziel/faro-shop/commit/d97447a4443e107318cbb8e10af7d82ddd0a097f))
* bump symfony/stimulus-bundle from 2.18.0 to 2.18.1 in the symfony group ([#371](https://github.com/cedricziel/faro-shop/issues/371)) ([8f4b2c5](https://github.com/cedricziel/faro-shop/commit/8f4b2c5f098fb309879c26cd579f067129ec0510))
* bump symfony/string from 6.4.2 to 6.4.3 ([#226](https://github.com/cedricziel/faro-shop/issues/226)) ([36e02d9](https://github.com/cedricziel/faro-shop/commit/36e02d9a6ae8a37d6679380fa70be43584c4e64e))
* bump the github-actions group with 1 update ([#193](https://github.com/cedricziel/faro-shop/issues/193)) ([84a5698](https://github.com/cedricziel/faro-shop/commit/84a56987bb93a6b1259a48243d195e57c70e8bdf))
* bump the grafana group with 5 updates ([#221](https://github.com/cedricziel/faro-shop/issues/221)) ([90c0466](https://github.com/cedricziel/faro-shop/commit/90c0466649b7aef628820319afbaba977ef8f416))
* bump the grafana group with 5 updates ([#241](https://github.com/cedricziel/faro-shop/issues/241)) ([008a697](https://github.com/cedricziel/faro-shop/commit/008a6971545cf91719b839f228efb336399fe5c4))
* bump the grafana group with 5 updates ([#251](https://github.com/cedricziel/faro-shop/issues/251)) ([c64ec5b](https://github.com/cedricziel/faro-shop/commit/c64ec5bac61e71260add7ce310598872bcdee9df))
* bump the grafana group with 5 updates ([#263](https://github.com/cedricziel/faro-shop/issues/263)) ([30f7cdd](https://github.com/cedricziel/faro-shop/commit/30f7cddbee790f4e464b3e26b128b5d8db3c6831))
* bump the grafana group with 5 updates ([#268](https://github.com/cedricziel/faro-shop/issues/268)) ([8cac9d4](https://github.com/cedricziel/faro-shop/commit/8cac9d4ebd8cb32d2c7618cdfe33b3d5df46ae93))
* bump the grafana group with 5 updates ([#274](https://github.com/cedricziel/faro-shop/issues/274)) ([5bd4593](https://github.com/cedricziel/faro-shop/commit/5bd4593496cee286fd51487687cae3bb345beec2))
* bump the grafana group with 5 updates ([#279](https://github.com/cedricziel/faro-shop/issues/279)) ([beebcb2](https://github.com/cedricziel/faro-shop/commit/beebcb233637c67d982651b13183f03e3cd43656))
* bump the grafana group with 5 updates ([#296](https://github.com/cedricziel/faro-shop/issues/296)) ([021ddac](https://github.com/cedricziel/faro-shop/commit/021ddac475ab5537e97f7560eb55633e021cb001))
* bump the grafana group with 5 updates ([#318](https://github.com/cedricziel/faro-shop/issues/318)) ([324855b](https://github.com/cedricziel/faro-shop/commit/324855b711e18750e05f67ee9edb7f425d529fad))
* bump the grafana group with 5 updates ([#328](https://github.com/cedricziel/faro-shop/issues/328)) ([60c9fe2](https://github.com/cedricziel/faro-shop/commit/60c9fe2dbea43e3a99bbe8a2e334453e2bab4905))
* bump the grafana group with 5 updates ([#341](https://github.com/cedricziel/faro-shop/issues/341)) ([5870396](https://github.com/cedricziel/faro-shop/commit/58703967edff98aec91d719645738f7689e2b3ff))
* Bump the open-telemetry group with 1 update ([#159](https://github.com/cedricziel/faro-shop/issues/159)) ([66c8e49](https://github.com/cedricziel/faro-shop/commit/66c8e49485018270560f8ad9288642a34c6c2e07))
* bump the open-telemetry group with 1 update ([#191](https://github.com/cedricziel/faro-shop/issues/191)) ([865afc0](https://github.com/cedricziel/faro-shop/commit/865afc0107295ac679f699ffb19a9ccf977c9545))
* bump the open-telemetry group with 1 update ([#222](https://github.com/cedricziel/faro-shop/issues/222)) ([85f2aa1](https://github.com/cedricziel/faro-shop/commit/85f2aa106b77f732040e40854f1c007bdcc0ed86))
* bump the open-telemetry group with 1 update ([#232](https://github.com/cedricziel/faro-shop/issues/232)) ([35540a6](https://github.com/cedricziel/faro-shop/commit/35540a60cdf0ad352f4cf3666a947ae3adef342b))
* bump the open-telemetry group with 1 update ([#235](https://github.com/cedricziel/faro-shop/issues/235)) ([991046c](https://github.com/cedricziel/faro-shop/commit/991046cc42d13add03d4d9b141fe8c7e7fc4a739))
* bump the open-telemetry group with 1 update ([#264](https://github.com/cedricziel/faro-shop/issues/264)) ([a790180](https://github.com/cedricziel/faro-shop/commit/a79018073b0a332457e43627c8a717e600aac786))
* bump the open-telemetry group with 1 update ([#297](https://github.com/cedricziel/faro-shop/issues/297)) ([6c01abb](https://github.com/cedricziel/faro-shop/commit/6c01abba7242b81e24cab4daa58e51861718909f))
* bump the open-telemetry group with 2 updates ([#260](https://github.com/cedricziel/faro-shop/issues/260)) ([5dddaa2](https://github.com/cedricziel/faro-shop/commit/5dddaa20c65b6d361cb74154b5e5f9e533d1ef33))
* bump the open-telemetry group with 2 updates ([#273](https://github.com/cedricziel/faro-shop/issues/273)) ([f3b145e](https://github.com/cedricziel/faro-shop/commit/f3b145edebe0397d76a79965506b676f3e4b5c05))
* bump the open-telemetry group with 8 updates ([#212](https://github.com/cedricziel/faro-shop/issues/212)) ([d949abe](https://github.com/cedricziel/faro-shop/commit/d949abede3b7ebda53844edfcce9073b49592249))
* bump the symfony group across 1 directory with 27 updates ([#322](https://github.com/cedricziel/faro-shop/issues/322)) ([510fb45](https://github.com/cedricziel/faro-shop/commit/510fb454fdf54fa48002e6a1895236fd54c1dd29))
* bump the symfony group with 1 update ([#253](https://github.com/cedricziel/faro-shop/issues/253)) ([e715253](https://github.com/cedricziel/faro-shop/commit/e715253c244030f57561ccfa41c8ca70bb0b299d))
* bump the symfony group with 1 update ([#265](https://github.com/cedricziel/faro-shop/issues/265)) ([86da290](https://github.com/cedricziel/faro-shop/commit/86da290aff782d2043fe289f2e0f52e2740dea59))
* bump the symfony group with 1 update ([#288](https://github.com/cedricziel/faro-shop/issues/288)) ([518c536](https://github.com/cedricziel/faro-shop/commit/518c536a20bbdccf5dc80b9ef505d31cc7cb26b6))
* bump the symfony group with 13 updates ([#295](https://github.com/cedricziel/faro-shop/issues/295)) ([9d77f6b](https://github.com/cedricziel/faro-shop/commit/9d77f6b3ca6cedf33931eee7d568b7681749ad76))
* bump the symfony group with 17 updates ([#259](https://github.com/cedricziel/faro-shop/issues/259)) ([b65dd0c](https://github.com/cedricziel/faro-shop/commit/b65dd0ca32550a121a52374ec7d340ba56da3aca))
* bump the symfony group with 2 updates ([#269](https://github.com/cedricziel/faro-shop/issues/269)) ([5ae7f26](https://github.com/cedricziel/faro-shop/commit/5ae7f26744af6677643a21b9569e91030309de17))
* bump the symfony group with 2 updates ([#272](https://github.com/cedricziel/faro-shop/issues/272)) ([246792a](https://github.com/cedricziel/faro-shop/commit/246792a88b845d952f2be8ef6375075bdc0405b2))
* bump the symfony group with 25 updates ([#248](https://github.com/cedricziel/faro-shop/issues/248)) ([7313cc5](https://github.com/cedricziel/faro-shop/commit/7313cc5e62a5feec80820a1f7908377c044f6c7a))
* bump the symfony group with 28 updates ([#359](https://github.com/cedricziel/faro-shop/issues/359)) ([662d426](https://github.com/cedricziel/faro-shop/commit/662d4265b375db27447f6d4eb1a916875eb1c291))
* bump twig/extra-bundle from 3.8.0 to 3.9.3 ([#312](https://github.com/cedricziel/faro-shop/issues/312)) ([8992456](https://github.com/cedricziel/faro-shop/commit/8992456a9c4caa2045904138d72ae712338dc7c7))
* bump twig/extra-bundle from 3.9.3 to 3.10.0 ([#332](https://github.com/cedricziel/faro-shop/issues/332)) ([7a2283d](https://github.com/cedricziel/faro-shop/commit/7a2283d6daf81c9033718628d131a0374ddb845d))
* bump twig/twig from 3.10.1 to 3.10.2 ([#337](https://github.com/cedricziel/faro-shop/issues/337)) ([aa35a89](https://github.com/cedricziel/faro-shop/commit/aa35a89be7af7082de9dfaafd64bf658b085a533))
* bump twig/twig from 3.10.2 to 3.10.3 ([#338](https://github.com/cedricziel/faro-shop/issues/338)) ([1351a56](https://github.com/cedricziel/faro-shop/commit/1351a56367790f7355b7819a795b25dffc028da2))
* bump twig/twig from 3.9.3 to 3.10.1 ([#331](https://github.com/cedricziel/faro-shop/issues/331)) ([23800a1](https://github.com/cedricziel/faro-shop/commit/23800a15287efaf94107499e23cddc86a8dffdab))
* bump webpack from 5.89.0 to 5.90.0 ([#213](https://github.com/cedricziel/faro-shop/issues/213)) ([99ec53c](https://github.com/cedricziel/faro-shop/commit/99ec53c1928040194dd4d206aac842fc02184508))
* bump webpack from 5.90.0 to 5.90.1 ([#228](https://github.com/cedricziel/faro-shop/issues/228)) ([0337e23](https://github.com/cedricziel/faro-shop/commit/0337e235b532e2e7e698e2d2ce448ff9dc2039d8))
* bump webpack from 5.90.1 to 5.90.2 ([#242](https://github.com/cedricziel/faro-shop/issues/242)) ([e301d4c](https://github.com/cedricziel/faro-shop/commit/e301d4cf28634d3a6d7235ee4b6e396197c13634))
* bump webpack from 5.90.2 to 5.90.3 ([#246](https://github.com/cedricziel/faro-shop/issues/246)) ([3e88a8f](https://github.com/cedricziel/faro-shop/commit/3e88a8fd55809401f2de3b4d8cae9ec3940d6558))
* bump webpack from 5.90.3 to 5.91.0 ([#285](https://github.com/cedricziel/faro-shop/issues/285)) ([c954556](https://github.com/cedricziel/faro-shop/commit/c95455695bd3fa334bbb3261f0a8cbd9c4ba8564))
* bump webpack from 5.91.0 to 5.92.0 ([#369](https://github.com/cedricziel/faro-shop/issues/369)) ([6d8d16b](https://github.com/cedricziel/faro-shop/commit/6d8d16beedad50e246f145f33c1eb0aa711c8444))
* bump webpack from 5.92.0 to 5.92.1 ([#381](https://github.com/cedricziel/faro-shop/issues/381)) ([9c27973](https://github.com/cedricziel/faro-shop/commit/9c279730a185bd568381e3a49c021277b3abf991))
* Bump webpack-cli from 4.10.0 to 5.1.4 ([#46](https://github.com/cedricziel/faro-shop/issues/46)) ([e77129e](https://github.com/cedricziel/faro-shop/commit/e77129e2d4e633bb4d705e2a906614918a6a4c12))
* bump WyriHaximus/github-action-helm3 from 3 to 4 ([#258](https://github.com/cedricziel/faro-shop/issues/258)) ([416659a](https://github.com/cedricziel/faro-shop/commit/416659a41f7595773504f53ad9710c19e7cc04e5))
* Correct k6 selector used ([#180](https://github.com/cedricziel/faro-shop/issues/180)) ([3721fe7](https://github.com/cedricziel/faro-shop/commit/3721fe70221ec904c7464277481373c127d3c578))
* disable tracing in caddy ([#387](https://github.com/cedricziel/faro-shop/issues/387)) ([e4c7e69](https://github.com/cedricziel/faro-shop/commit/e4c7e6968496da485f2f7225a3fe4b6793e2a231))
* Dont create dynamic property ([#177](https://github.com/cedricziel/faro-shop/issues/177)) ([b1d8247](https://github.com/cedricziel/faro-shop/commit/b1d8247e1738411fee6f042a6e3b586da07449f0))
* Dont depend on lint ([#153](https://github.com/cedricziel/faro-shop/issues/153)) ([78aeb6f](https://github.com/cedricziel/faro-shop/commit/78aeb6f409395bd85583d7d92f8cf1c5b836df25))
* Dont depend on version step ([#157](https://github.com/cedricziel/faro-shop/issues/157)) ([a6a4ffb](https://github.com/cedricziel/faro-shop/commit/a6a4ffb9f71697394f81424813698c280b6022ce))
* dont include v in tag ([#164](https://github.com/cedricziel/faro-shop/issues/164)) ([55f0241](https://github.com/cedricziel/faro-shop/commit/55f02419a1728fb95a7ee262e1d0dc387b412c10))
* Fix healthcheck ([#374](https://github.com/cedricziel/faro-shop/issues/374)) ([0b8bb0f](https://github.com/cedricziel/faro-shop/commit/0b8bb0fe247766f5bf923ce36ddbd51997b956bc))
* initialize faro directly ([#192](https://github.com/cedricziel/faro-shop/issues/192)) ([a30500d](https://github.com/cedricziel/faro-shop/commit/a30500d14fb1433e9cd34039071a604cfc2b8bb8))
* k6 should wait for checkout to succeed or fail ([#198](https://github.com/cedricziel/faro-shop/issues/198)) ([9f4f352](https://github.com/cedricziel/faro-shop/commit/9f4f352dfa94618f36327f5f0882944b244f2338))
* Move rlp to release-please.yml ([#252](https://github.com/cedricziel/faro-shop/issues/252)) ([ae03598](https://github.com/cedricziel/faro-shop/commit/ae03598c369ddf1be4b0df7dd8fcf6e5788dff06))
* pin opentelemetry dependency to solve build issue ([#195](https://github.com/cedricziel/faro-shop/issues/195)) ([312a0e5](https://github.com/cedricziel/faro-shop/commit/312a0e5176816a3e255186c1a2f11a59ca690722))
* prevent default correctly ([#207](https://github.com/cedricziel/faro-shop/issues/207)) ([065629d](https://github.com/cedricziel/faro-shop/commit/065629d5fc1c3c4c59a041928e84a6cfe9003961))
* reduce instrumentation ([#209](https://github.com/cedricziel/faro-shop/issues/209)) ([729cbca](https://github.com/cedricziel/faro-shop/commit/729cbca00ea9e3b5d3c05a80387d9918f1790de4))
* Rely on tag name for releases ([#155](https://github.com/cedricziel/faro-shop/issues/155)) ([5efaef3](https://github.com/cedricziel/faro-shop/commit/5efaef36d840844ee0281c8758ac3fa9d58610f6))
* resolve FARO_URL instead of pinning it at compile time ([#167](https://github.com/cedricziel/faro-shop/issues/167)) ([8df51ee](https://github.com/cedricziel/faro-shop/commit/8df51ee5d9ad3da3815ca081744d7c6d89580a84))
* Set backend service name & deployment.environment ([#170](https://github.com/cedricziel/faro-shop/issues/170)) ([63e7611](https://github.com/cedricziel/faro-shop/commit/63e7611d0625f260d80d7e31304ca7013e4671ff))
* Set correct service name for frontend ([#171](https://github.com/cedricziel/faro-shop/issues/171)) ([09a1d33](https://github.com/cedricziel/faro-shop/commit/09a1d33c5a0f56cf86243c13a9f244f3bbb6ff71))
* Set environment variables for faro and loadgen ([#176](https://github.com/cedricziel/faro-shop/issues/176)) ([588fe7e](https://github.com/cedricziel/faro-shop/commit/588fe7e192a29f706a1296faa283d6d08db0cf1b))
* Switch to protobuf ([#149](https://github.com/cedricziel/faro-shop/issues/149)) ([c43383b](https://github.com/cedricziel/faro-shop/commit/c43383bd32d5c816ca321d22b0b24b665256a163))
* Update Recipe ([#375](https://github.com/cedricziel/faro-shop/issues/375)) ([e6746cf](https://github.com/cedricziel/faro-shop/commit/e6746cfe61c9e0a0b219752b9701e7f760b5c26c))


### Miscellaneous Chores

* bump ([#351](https://github.com/cedricziel/faro-shop/issues/351)) ([e25b75a](https://github.com/cedricziel/faro-shop/commit/e25b75a8887e8038f488b8d25a2e7379fb97fda6))
* release 0.6.0 ([75bf3ff](https://github.com/cedricziel/faro-shop/commit/75bf3ff8a58655297fa6c96ee69a0c3e2ef89edd))
* release 0.7.0 ([2e66184](https://github.com/cedricziel/faro-shop/commit/2e66184254319bd45c6fadaa65cc9f0b30d573fc))

## [0.6.1](https://github.com/cedricziel/faro-shop/compare/v0.6.0...v0.6.1) (2024-06-22)


### Bug Fixes

* build custom caddy version to inject client spans ([#385](https://github.com/cedricziel/faro-shop/issues/385)) ([b108ca9](https://github.com/cedricziel/faro-shop/commit/b108ca96bd9ec32910ac83e1b0417bdbce53e88c))

## [0.6.0](https://github.com/cedricziel/faro-shop/compare/v0.5.5...v0.6.0) (2024-06-21)


### Features

* enable tracing in caddy ([#383](https://github.com/cedricziel/faro-shop/issues/383)) ([d991ed6](https://github.com/cedricziel/faro-shop/commit/d991ed6fb86a38a5c04d73d643c9e3381213843d))

## [0.5.5](https://github.com/cedricziel/faro-shop/compare/v0.5.4...v0.5.5) (2024-06-20)


### Bug Fixes

* bump otel/opentelemetry-collector-contrib from 0.102.1 to 0.103.0 in /docker/otelcol ([#378](https://github.com/cedricziel/faro-shop/issues/378)) ([a5b9ddd](https://github.com/cedricziel/faro-shop/commit/a5b9dddd7685b72c8c7b5458d04f38f09effa01c))
* bump phpunit/phpunit from 11.2.2 to 11.2.3 ([#379](https://github.com/cedricziel/faro-shop/issues/379)) ([5a79a48](https://github.com/cedricziel/faro-shop/commit/5a79a486cbb16a15b443419e1529962c9e16a111))
* bump phpunit/phpunit from 11.2.3 to 11.2.5 ([#382](https://github.com/cedricziel/faro-shop/issues/382)) ([3664895](https://github.com/cedricziel/faro-shop/commit/36648951d804df03efa65b3dad8bffa4a28dc228))
* bump webpack from 5.92.0 to 5.92.1 ([#381](https://github.com/cedricziel/faro-shop/issues/381)) ([9c27973](https://github.com/cedricziel/faro-shop/commit/9c279730a185bd568381e3a49c021277b3abf991))

## [0.5.4](https://github.com/cedricziel/faro-shop/compare/v0.5.3...v0.5.4) (2024-06-17)


### Bug Fixes

* Update Recipe ([#375](https://github.com/cedricziel/faro-shop/issues/375)) ([e6746cf](https://github.com/cedricziel/faro-shop/commit/e6746cfe61c9e0a0b219752b9701e7f760b5c26c))

## [0.5.3](https://github.com/cedricziel/faro-shop/compare/v0.5.2...v0.5.3) (2024-02-22)


### Bug Fixes

* bump @babel/core from 7.23.7 to 7.23.9 ([#217](https://github.com/cedricziel/faro-shop/issues/217)) ([725de12](https://github.com/cedricziel/faro-shop/commit/725de12df86088bdc08cfde9e1eb791d272826f9))
* bump @babel/preset-env from 7.23.8 to 7.23.9 ([#215](https://github.com/cedricziel/faro-shop/issues/215)) ([9c23e83](https://github.com/cedricziel/faro-shop/commit/9c23e83147e5bda66dd96deb25f46bbeb782ce2e))
* bump @symfony/webpack-encore from 4.5.0 to 4.6.1 ([#216](https://github.com/cedricziel/faro-shop/issues/216)) ([3eba699](https://github.com/cedricziel/faro-shop/commit/3eba699df6a25430248531697000d1b45116348a))
* bump dbrekelmans/bdi from 1.1.0 to 1.1.1 ([#243](https://github.com/cedricziel/faro-shop/issues/243)) ([4c3fb8d](https://github.com/cedricziel/faro-shop/commit/4c3fb8dc585ca910fa09b1975fa937b4f8cd4e5b))
* bump dbrekelmans/bdi from 1.1.1 to 1.2.0 ([#247](https://github.com/cedricziel/faro-shop/issues/247)) ([d67a259](https://github.com/cedricziel/faro-shop/commit/d67a2594e880aada780f8afe15f5090fe9005d2f))
* bump doctrine/doctrine-bundle from 2.11.1 to 2.11.2 ([#233](https://github.com/cedricziel/faro-shop/issues/233)) ([d985be5](https://github.com/cedricziel/faro-shop/commit/d985be5c55ca74ea2de4a11743c5d95d24a15ad8))
* bump doctrine/doctrine-bundle from 2.11.2 to 2.11.3 ([#239](https://github.com/cedricziel/faro-shop/issues/239)) ([a477229](https://github.com/cedricziel/faro-shop/commit/a477229be2e6e3767c4f1355838e6449a6a56c34))
* bump doctrine/orm from 2.17.3 to 2.17.4 ([#219](https://github.com/cedricziel/faro-shop/issues/219)) ([a19d596](https://github.com/cedricziel/faro-shop/commit/a19d596545aa8cb82d6d41bb89fbf88ca388abd2))
* bump google/protobuf from 3.25.2 to 3.25.3 ([#244](https://github.com/cedricziel/faro-shop/issues/244)) ([25df879](https://github.com/cedricziel/faro-shop/commit/25df879c63d5ddfba5e948e3844dab4bf075da2a))
* bump grafana/k6 from 0.48.0-with-browser to 0.49.0-with-browser in /docker/k6 ([#220](https://github.com/cedricziel/faro-shop/issues/220)) ([0c7ca38](https://github.com/cedricziel/faro-shop/commit/0c7ca389ce2c3dd83f41ee966d7d66c6d441257b))
* bump otel/opentelemetry-collector-contrib from 0.92.0 to 0.93.0 in /docker/otelcol ([#218](https://github.com/cedricziel/faro-shop/issues/218)) ([a0319ed](https://github.com/cedricziel/faro-shop/commit/a0319ed046e309531605ee50e0ffd377f7caa019))
* bump otel/opentelemetry-collector-contrib from 0.93.0 to 0.95.0 in /docker/otelcol ([#250](https://github.com/cedricziel/faro-shop/issues/250)) ([b5bd7ad](https://github.com/cedricziel/faro-shop/commit/b5bd7ada6569a1b885c046c9dceed1a08a2f5c88))
* bump php from 8.3.2-fpm-alpine to 8.3.3-fpm-alpine ([#245](https://github.com/cedricziel/faro-shop/issues/245)) ([6214930](https://github.com/cedricziel/faro-shop/commit/6214930a7005e5d4121b22f5dc5850c2c72042a3))
* bump symfony/mime from 6.4.0 to 6.4.3 ([#224](https://github.com/cedricziel/faro-shop/issues/224)) ([fa654f4](https://github.com/cedricziel/faro-shop/commit/fa654f4bcf592ffe115635bda58ea44854125227))
* bump symfony/property-info from 6.4.0 to 6.4.3 ([#225](https://github.com/cedricziel/faro-shop/issues/225)) ([c3b299f](https://github.com/cedricziel/faro-shop/commit/c3b299f96d7b9a6df8e4cf5899819e6275fe7874))
* bump symfony/string from 6.4.2 to 6.4.3 ([#226](https://github.com/cedricziel/faro-shop/issues/226)) ([36e02d9](https://github.com/cedricziel/faro-shop/commit/36e02d9a6ae8a37d6679380fa70be43584c4e64e))
* bump the grafana group with 5 updates ([#221](https://github.com/cedricziel/faro-shop/issues/221)) ([90c0466](https://github.com/cedricziel/faro-shop/commit/90c0466649b7aef628820319afbaba977ef8f416))
* bump the grafana group with 5 updates ([#241](https://github.com/cedricziel/faro-shop/issues/241)) ([008a697](https://github.com/cedricziel/faro-shop/commit/008a6971545cf91719b839f228efb336399fe5c4))
* bump the grafana group with 5 updates ([#251](https://github.com/cedricziel/faro-shop/issues/251)) ([c64ec5b](https://github.com/cedricziel/faro-shop/commit/c64ec5bac61e71260add7ce310598872bcdee9df))
* bump the open-telemetry group with 1 update ([#222](https://github.com/cedricziel/faro-shop/issues/222)) ([85f2aa1](https://github.com/cedricziel/faro-shop/commit/85f2aa106b77f732040e40854f1c007bdcc0ed86))
* bump the open-telemetry group with 1 update ([#232](https://github.com/cedricziel/faro-shop/issues/232)) ([35540a6](https://github.com/cedricziel/faro-shop/commit/35540a60cdf0ad352f4cf3666a947ae3adef342b))
* bump the open-telemetry group with 1 update ([#235](https://github.com/cedricziel/faro-shop/issues/235)) ([991046c](https://github.com/cedricziel/faro-shop/commit/991046cc42d13add03d4d9b141fe8c7e7fc4a739))
* bump the open-telemetry group with 8 updates ([#212](https://github.com/cedricziel/faro-shop/issues/212)) ([d949abe](https://github.com/cedricziel/faro-shop/commit/d949abede3b7ebda53844edfcce9073b49592249))
* bump webpack from 5.89.0 to 5.90.0 ([#213](https://github.com/cedricziel/faro-shop/issues/213)) ([99ec53c](https://github.com/cedricziel/faro-shop/commit/99ec53c1928040194dd4d206aac842fc02184508))
* bump webpack from 5.90.0 to 5.90.1 ([#228](https://github.com/cedricziel/faro-shop/issues/228)) ([0337e23](https://github.com/cedricziel/faro-shop/commit/0337e235b532e2e7e698e2d2ce448ff9dc2039d8))
* bump webpack from 5.90.1 to 5.90.2 ([#242](https://github.com/cedricziel/faro-shop/issues/242)) ([e301d4c](https://github.com/cedricziel/faro-shop/commit/e301d4cf28634d3a6d7235ee4b6e396197c13634))
* bump webpack from 5.90.2 to 5.90.3 ([#246](https://github.com/cedricziel/faro-shop/issues/246)) ([3e88a8f](https://github.com/cedricziel/faro-shop/commit/3e88a8fd55809401f2de3b4d8cae9ec3940d6558))
* Move rlp to release-please.yml ([#252](https://github.com/cedricziel/faro-shop/issues/252)) ([ae03598](https://github.com/cedricziel/faro-shop/commit/ae03598c369ddf1be4b0df7dd8fcf6e5788dff06))

## [0.5.2](https://github.com/cedricziel/faro-shop/compare/v0.5.1...v0.5.2) (2024-01-23)


### Bug Fixes

* reduce instrumentation ([#209](https://github.com/cedricziel/faro-shop/issues/209)) ([729cbca](https://github.com/cedricziel/faro-shop/commit/729cbca00ea9e3b5d3c05a80387d9918f1790de4))

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
