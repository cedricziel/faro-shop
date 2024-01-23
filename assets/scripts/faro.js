import { getWebInstrumentations, initializeFaro as initializeFaroReal } from '@grafana/faro-web-sdk';
import {FetchInstrumentation} from "@grafana/faro-instrumentation-fetch";
import {XHRInstrumentation} from "@grafana/faro-instrumentation-xhr";
import { TracingInstrumentation } from '@grafana/faro-web-tracing';

const faroPage = window.faroPageMeta || {};
const faroUrl = window.faroUrl || null;
const VERSION = window.VERSION || 'unknown';

export function initializeFaro() {
    return initializeFaroReal({
        url: faroUrl,
        app: {
            name: 'faros-shop-frontend',
            version: VERSION,
            environment: 'production'
        },
        instrumentations: [
            // Mandatory, overwriting the instrumentations array would cause the default instrumentations to be omitted
            ...getWebInstrumentations({enablePerformanceInstrumentation: true}),

            // Initialization of the tracing package.
            // This packages is optional because it increases the bundle size noticeably. Only add it if you want tracing data.
            new TracingInstrumentation(),
            new FetchInstrumentation(),
            new XHRInstrumentation(),
        ],
        metas: [
            () => ({
                page: faroPage,
            }),
        ],
        sessionTracking: {
            enabled: true,
            persistent: true,
        }
    });
}
