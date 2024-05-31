import { getWebInstrumentations, initializeFaro as initializeFaroReal } from '@grafana/faro-web-sdk';
import { TracingInstrumentation } from '@grafana/faro-web-tracing';

const faroPage = window.faroPageMeta || {};
const faroUrl = window.faroUrl || null;
const VERSION = window.VERSION || 'unknown';

export function initializeFaro() {
    return initializeFaroReal({
        url: faroUrl,
        beforeSend: (event) => {
            if(event.type !== 'event') return event;
            if(event.payload.name !== 'faro.performance.navigation') return event;

            for (const entryType of ["navigation"]) {
                for (const { name: url, serverTiming } of performance.getEntriesByType(
                    entryType,
                )) {
                    if (serverTiming) {
                        for (const { name, description, duration } of serverTiming) {
                            console.log(description);
                            if ("traceparent" === name) {
                                const [version, traceId, spanId, sampled] = description.split("-");
                                // Logs "traceId: 00-0af7651916cd43dd8448eb211c80319c, spanId: 0af7651916cd43dd"

                                event.payload.trace = {};
                                event.payload.trace.trace_id = traceId;

                                event.payload.trace.span_id = spanId;
                            }
                        }
                    }
                }
            }

            return event;
        },
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
