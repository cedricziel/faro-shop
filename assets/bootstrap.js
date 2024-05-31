import { startStimulusApp } from '@symfony/stimulus-bridge';
import ContentLoader from "@stimulus-components/content-loader";

// Registers Stimulus controllers from controllers.json and in the controllers/ directory
export const app = startStimulusApp(require.context(
    '@symfony/stimulus-bridge/lazy-controller-loader!./controllers',
    true,
    /\.[jt]sx?$/
));
// register any custom, 3rd party controllers here
app.register('content-loader', ContentLoader);
