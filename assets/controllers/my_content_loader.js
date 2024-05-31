import ContentLoader from '@stimulus-components/content-loader'

/* stimulusFetch: 'lazy' */
export default class extends ContentLoader {
    connect() {
        super.connect();

        document.addEventListener("error", this.reportError.bind(this))
    }

    reportError() {
        faro.api.pushError(new Error('Failed to load ads'));
    }
}
