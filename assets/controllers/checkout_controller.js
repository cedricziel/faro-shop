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

    async submit(event) {
        event.preventDefault();

        try {
            await fetch(this.apiValue, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                method: 'POST',
                body: {},
            });

            faro.api.pushEvent('checkout_success');

            setTimeout(() => {
                location.href = this.successUrlValue;
            }, 250);
        } catch (e) {
            faro.api.pushEvent('checkout_failed');
            faro.api.pushError(new Error('checkout_failed'));

            setTimeout(() => {
                location.href = this.failureUrlValue;
            }, 250)
        }
    }
}
