import {Controller} from "@hotwired/stimulus";

/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static values = {
        message: String
    };

    connect() {
        throw new Error(this.messageValue)
    }
}
