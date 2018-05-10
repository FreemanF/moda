//@flow
import Rx from 'rxjs/Rx';
import React from 'react';
import ReactDOM from 'react-dom';
import {actionIs} from '../utils';
import ComplainLink from './components/ComplainLink';
import {ComplainLinkAppState} from './models';
import {
    complainLinkClicked,
    complainLinkClickedResponseReceived,
    complainFormSubmit,
    complainFormSubmitResponseReceived,
    closeClicked
} from './actions';
import each from 'lodash/each';


(function() {
    const mountToList = document.querySelectorAll('.js-complain-link');

    if (mountToList.length) {
        each(mountToList, (mountTo) => {
            let eventStream = new Rx.Subject();
            let initialState = window.AppState = new ComplainLinkAppState(window, document).getState();
            if (mountTo.dataset) {
                initialState.location = mountTo.dataset.location;
            }

            let fs = [
                eventStream
                    .filter(actionIs('complainLinkClicked'))
                    .debounceTime(200)
                    .map(complainLinkClicked),

                eventStream
                    .filter(actionIs('complainLinkClickedResponseReceived'))
                    .map(complainLinkClickedResponseReceived),

                eventStream
                    .filter(actionIs('complainFormSubmit'))
                    .debounceTime(200)
                    .map(complainFormSubmit),

                eventStream
                    .filter(actionIs('complainFormSubmitResponseReceived'))
                    .map(complainFormSubmitResponseReceived),

                eventStream
                    .filter(actionIs('closeClicked'))
                    .map(closeClicked),
            ];

            Rx.Observable
                .merge(...fs)
                .scan((state, action) => action(state), initialState)
                .startWith(initialState)
                .subscribe(
                    function (state) {
                        ReactDOM.render(<ComplainLink
                            eventStream={eventStream}
                            {...state}/>, mountTo)
                    }
                );
        });
    }
}());



// WEBPACK FOOTER //
// ./shafa/js/profile/complain_link_main.js