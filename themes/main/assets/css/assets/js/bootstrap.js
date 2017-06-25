//@flow
import Rx from 'rxjs/Rx';
import merge from 'lodash/merge';


export class AppState {
    data: Object; // TODO Deprecated
    __raw_data: Object;

    constructor(window: window, document: Document) {
        this.data = {};// TODO Deprecated
        this.__raw_data = {};
        var contexts = document.querySelectorAll('script[type="application/json+context"]');
        for (var i = 0; i < contexts.length; i++) {
            var obj = JSON.parse(contexts[i].textContent);
            this.data = merge(this.data, obj);// TODO Deprecated
            this.__raw_data = merge(this.__raw_data, obj);

        }
    }

    getState(): AppState {
        // automatically assign all keys from raw data to current object
        Object.keys(this.__raw_data).map(k => {
            (this: Object)[k] = this.__raw_data[k]; // This is ugly Flow workaround for `this[k] = <smth>`
        });
        return this;
    }
}

// console polyfill
window.console = window.console || {
        log: function () {
        }
    };

const appBus = new Rx.Subject();

export function getAppBus() {
    return appBus;
}



// WEBPACK FOOTER //
// ./shafa/js/bootstrap.js