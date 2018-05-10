//@flow
import Rx from 'rxjs/Rx';
import React from 'react';
import ReactDOM from 'react-dom';
import {actionIs} from '../utils';
import FollowButton from './components/FollowButton';
import {
    followButtonClicked,
    followButtonClickedResponseReceived
} from './actions';
import {FollowButtonAppState} from './models';
import merge from 'lodash/merge';


(function() {
    const eventStream = new Rx.Subject();
    const mountTo = document.querySelector('.js-follow-button');

    if (mountTo && mountTo.dataset) {
        let initialState = window.AppState = new FollowButtonAppState(window, document).getState();
        // User merge() instead of Object.assign as there's a bug in Safari
        // that can't handle merge plain object with DOMStringMap (returned by HTMLElement.dataset)
        initialState = merge(initialState, mountTo.dataset);

        let fs = [
            eventStream
                .filter(actionIs('followButtonClicked'))
                .debounceTime(300)
                .map(followButtonClicked),
            eventStream
                .filter(actionIs('followButtonClickedResponseReceived'))
                .map(followButtonClickedResponseReceived),
        ];

        Rx.Observable
            .merge(...fs)
            .scan((state, action) => action(state), initialState)
            .startWith(initialState)
            .subscribe(
                function (state) {
                    ReactDOM.render(<FollowButton 
                        eventStream={eventStream}
                        {...state}
                    />, mountTo)
                }
            );
    }
}());



// WEBPACK FOOTER //
// ./shafa/js/profile/follow_button_main.js