import { Controller } from '@hotwired/stimulus';
import {faro} from "@grafana/faro-web-sdk";

/*
* The following line makes this controller "lazy": it won't be downloaded until needed
* See https://github.com/symfony/stimulus-bridge#lazy-controllers
*/
/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ['form', 'submit'];

    static values = {
        'api': String,
        'total': String,
        'successUrl': String,
        'failureUrl': String
    };

    connect() {
        console.log(this.apiValue);
    }

    async submit() {
        faro.api.pushEvent('checkout');

        try {
            await fetch(this.apiValue, {
                method: 'POST',
            });

            faro.api.pushEvent('checkout_success');

            location.href = this.successUrlValue;
        } catch (e) {
            faro.api.pushError(new Error('checkout_failed'));

            location.href = this.failureUrlValue;
        }
    }
}
