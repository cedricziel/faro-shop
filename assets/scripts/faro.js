import {TransportItem} from "@grafana/faro-web-sdk";
import { getWebInstrumentations, initializeFaro as initializeFaroReal } from '@grafana/faro-web-sdk';
import { TracingInstrumentation } from '@grafana/faro-web-tracing';
import {PerformanceTimelineInstrumentation} from "@grafana/faro-instrumentation-performance-timeline";

const faroPage = window.faroPageMeta || {};
const faroUrl = window.faroUrl || null;

/** @param {TransportItem} event */
function beforeSend(event) {
    return event;
}

export function initializeFaro() {
    return initializeFaroReal({
        beforeSend: beforeSend,
        url: faroUrl,
        app: {
            name: 'faros-shop',
            version: '1.0.0',
            environment: 'production'
        },
        instrumentations: [
            // Mandatory, overwriting the instrumentations array would cause the default instrumentations to be omitted
            ...getWebInstrumentations(),

            // Initialization of the tracing package.
            // This packages is optional because it increases the bundle size noticeably. Only add it if you want tracing data.
            new TracingInstrumentation(),
            new PerformanceTimelineInstrumentation(),
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
