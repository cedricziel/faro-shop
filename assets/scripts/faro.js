import {BaseInstrumentation, TransportItem} from "@grafana/faro-web-sdk";
import { getWebInstrumentations, initializeFaro as initializeFaroReal } from '@grafana/faro-web-sdk';
import { TracingInstrumentation } from '@grafana/faro-web-tracing';
import {PerformanceTimelineInstrumentation} from "@grafana/faro-instrumentation-performance-timeline";

const faroPage = window.faroPageMeta || {};
const faroUrl = window.faroUrl || null;

class PageLoadInstrumentation extends BaseInstrumentation {
    name = 'page-load';
    version = '0.0.1';

    collectPerformance() {
        performance.getEntriesByType('navigation').forEach((entry) => {
            const eventName = `${entry.name}`;
            const attributes = {
                duration: `${entry.duration}`,
                startTime: `${entry.startTime}`
            };

            if (entry.serverTiming !== undefined) {
                entry.serverTiming.forEach((serverTiming) => {
                    attributes[`serverTiming_${serverTiming.name}`] = serverTiming.description;
                });
            }

            this.api.pushEvent(eventName, attributes);
        });
    }

    onDocumentLoaded() {
        // Timeout is needed as load event doesn't have yet the performance metrics for loadEnd.
        // Support for event "loadend" is very limited and cannot be used
        window.setTimeout(() => {
            this.collectPerformance();
        });
    }

    waitForPageLoad() {
        if (window.document.readyState === 'complete') {
            this.onDocumentLoaded();
        }
        else {
            this.onDocumentLoaded = this.onDocumentLoaded.bind(this);
            window.addEventListener('load', this.onDocumentLoaded);
        }
    }

    initialize() {
        // remove previously attached load to avoid adding the same event twice
        // in case of multiple enable calling.
        window.removeEventListener('load', this.onDocumentLoaded);
        this.waitForPageLoad();
    }
}

/** @param {TransportItem} event */
function beforeSend(event) {
    if (event.payload.attributes && event.payload.attributes.serverTiming_traceparent !== undefined) {
        const traceparent = event.payload.attributes.serverTiming_traceparent;
        const traceparentParts = traceparent.split('-');
        const traceId = traceparentParts[1];
        const spanId = traceparentParts[2];

        event.payload.trace = {};
        event.payload.trace.trace_id = traceId;
        event.payload.trace.span_id = spanId;
    }

    return event;
}

export function initializeFaro() {
    return initializeFaroReal({
        beforeSend: beforeSend,
        url: faroUrl,
        app: {
            name: 'faros-shop',
            version: VERSION,
            environment: 'production'
        },
        instrumentations: [
            // Mandatory, overwriting the instrumentations array would cause the default instrumentations to be omitted
            ...getWebInstrumentations(),

            // Initialization of the tracing package.
            // This packages is optional because it increases the bundle size noticeably. Only add it if you want tracing data.
            new TracingInstrumentation(),
            new PerformanceTimelineInstrumentation(),
            new PageLoadInstrumentation(),
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
