import { getWebInstrumentations, initializeFaro as initializeFaroReal } from '@grafana/faro-web-sdk';
import { TracingInstrumentation } from '@grafana/faro-web-tracing';

const appVersion = window.version || 'unknown';
const faroPage = window.faroPageMeta || {};
const faroUrl = window.faroUrl || null;
const faroNamespace = window.faroNamespace || undefined;
const faroCountry = window.faroCountry || undefined;

export function initializeFaro() {
    return initializeFaroReal({
        url: faroUrl,
        app: {
            name: 'faro-shop-frontend',
            namespace: faroNamespace,
            version: appVersion,
            environment: 'production'
        },
        instrumentations: [
            // Mandatory, overwriting the instrumentations array would cause the default instrumentations to be omitted
            ...getWebInstrumentations({enablePerformanceInstrumentation: true}),

            // Initialization of the tracing package.
            // This packages is optional because it increases the bundle size noticeably. Only add it if you want tracing data.
            new TracingInstrumentation({
                resourceAttributes: {
                    ['service.namespace']: faroNamespace,
                    ['geo.country']: faroCountry,
                }
            }),
        ],
        metas: [
            () => ({
                page: faroPage,
                session: {
                    attributes: {
                        country: faroCountry,
                    }
                },
            }),
        ],
        sessionTracking: {
            enabled: true,
            persistent: true,
        }
    });
}
