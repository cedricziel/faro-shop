import { startStimulusApp } from '@symfony/stimulus-bridge';
import ContentLoader from "@stimulus-components/content-loader";
import {faro} from "@grafana/faro-web-sdk";

// Registers Stimulus controllers from controllers.json and in the controllers/ directory
export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
));
// register any custom, 3rd party controllers here
app.register('content-loader', ContentLoader);

app.handleError((error, message, detail) => {
    faro.api.pushError({message, detail});
});
