import { getWebInstrumentations, initializeFaro as initializeFaroReal } from '@grafana/faro-web-sdk';
import { TracingInstrumentation } from '@grafana/faro-web-tracing';

const appVersion = window.version || 'unknown';
const faroPage = window.faroPageMeta || {};
const faroUrl = window.faroUrl || null;
const faroNamespace = window.faroNamespace || undefined;
const faroCountry = window.faroCountry || undefined;

export function initializeFaro() {
    return initializeFaroReal({
        beforeSend: (item) => {
            delete item.meta.k6;
            
            return item;
        },
        url: faroUrl,
        app: {
            name: 'faro-shop-frontend',
            namespace: faroNamespace,
            version: appVersion,
            environment: 'production'
        },
        instrumentations: [
            // Mandatory, overwriting the instrumentations array would cause the default instrumentations to be omitted
            ...getWebInstrumentations(),

            // Initialization of the tracing package.
            // This packages is optional because it increases the bundle size noticeably. Only add it if you want tracing data.
            new TracingInstrumentation({
                resourceAttributes: {
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
            persistent: true,
        }
        trackWebVitalsAttribution: true,
    });
}
