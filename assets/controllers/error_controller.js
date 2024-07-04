import {Controller} from "@hotwired/stimulus";
import {faro} from "@grafana/faro-web-sdk";

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static values = {
        message: String
    };

    onError(event) {
        faro.api.pushError(event.detail.error);
    }
}
