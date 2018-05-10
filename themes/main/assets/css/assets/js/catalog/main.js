import 'babel-polyfill';
import Rx from 'rxjs/Rx';
import React from 'react';
import ReactDOM from 'react-dom';
import request from 'superagent';
import merge from 'lodash/merge';
import {getAppBus} from '../bootstrap';
import {actionIs, toGetParams} from '../utils';
import {bindInterfaces} from './interfaces';
import {AD_CATALOG_TOP, AD_CATALOG_BOTTOM} from './ads';

import {
    priceChangeAction,
    cityFilterAction,
    sizeChangeAction,
    colorChangeAction,
    conditionChangeAction,
    brandChangeAction,
    brandInputChanged,
    brandsSuggestionsReceived,
    clearAllFiltersAction,
    sortingDirectionChangeAction,
    priceRangeChangeAction,
    setPageAction,
    clearFilterValueAction,
    excludeFilterValueAction,
    applySearchStringAction,
    cityChangeAction,
    cityFormSubmitAction,
    closeClickedAction
} from './actions';


let appBus = getAppBus();
let SCROLL_OFFSET = 0;
const MOUNT = '.js-filters-container';
const PJAX_MOUNT = '.js-pjax-mount';
const LOADING_CSS_CLASS = 'b-main__inner_state_loading';


function requestFilteredProducts({config, state}) {
    let mainContent = document.querySelector(PJAX_MOUNT);
    mainContent.classList.add(LOADING_CSS_CLASS);
    let params = merge(state.FilterState, {
        page: state.pageNum,
        search_text: state.FilterState.search_text ? state.FilterState.search_text : null
    });
    return request
        .get(config.pjaxBaseUrl + toGetParams(params))
        .set('X-Pjax', 'true');
}

function renderProducts(response) {
    let mainContent = document.querySelector(PJAX_MOUNT);
    mainContent.classList.remove(LOADING_CSS_CLASS);
    mainContent.innerHTML = response.text;

    // refresh ad slots
    $('.js-gslot-catalog-top').html(AD_CATALOG_TOP);
    $('.js-gslot-catalog-bottom').html(AD_CATALOG_BOTTOM);

    // reactivate lazy images
    $('.js-lazy-img').lazyLoadXT();

    // scroll to first products
    $('html, body').animate({
        scrollTop: $(mainContent).offset().top - SCROLL_OFFSET
    }, 300);

    // reactivate toggles
    $(".js-toggle[data-target-id!=''][data-target-id][data-toggle-classname!=''][data-toggle-classname]").click(function(){
        var $this = $(this);
        $("#"+$this.data("targetId")).toggleClass($this.data("toggleClassname"));
    });

    // refresh DFP slots
    // if (typeof googletag !== 'undefined') {
    //     googletag.pubads().refresh();
    // }
}

export function makeMain(window, document, filterComponent, modelClass, scrollOffset=0) {
    return function() {
        const blackHoleEventStream = new Rx.Subject(); // Event stream for events from DOM
        const eventStream = new Rx.Subject();
        let startup = true;
        SCROLL_OFFSET = scrollOffset;

        // Bind events on DOM elements
        // that will go directly into blackhole event stream
        bindInterfaces(document, blackHoleEventStream);

        let initialState = window.AppState = new modelClass(window, document).getState();
        const filtersContainer = document.querySelector(MOUNT);

        let filtersChangedStream = appBus.filter(actionIs('filter'));
        filtersChangedStream
            .flatMap(requestFilteredProducts)
            .do(renderProducts)
            .subscribe(
                () => {},
                console.error.bind(console)
            );


        function updateFilters([state, effect]) {
            let component = React.createElement(filterComponent, {
                eventStream: eventStream,
                priceFilters: state.FilterData.price,
                cityFilters: state.FilterData.city,
                sizeFilters: state.sizeGroupId ? state.FilterData.size_groups[state.sizeGroupId].sizes : null,
                colorFilters: state.FilterData.color,
                conditionFilters: state.FilterData.condition,
                brandFilters: state.FilterData.brand,
                data: state
            });
            ReactDOM.render(component, filtersContainer);
        }

        function fetchWithFilters([state, effect]) {
            if (!startup) {
                appBus.next({
                    action: 'filter',
                    config: initialState.config,
                    state: state
                });
            } else {
                startup = false;
            }
        }

        // Stream that just change state of app
        const stateChangeStream = [
            eventStream.filter(actionIs('brandInputChanged')).debounceTime(1000).distinctUntilChanged().map(brandInputChanged),
            eventStream.filter(actionIs('brandsSuggestReceived')).map(brandsSuggestionsReceived),
            eventStream.filter(actionIs('cityChangeClicked')).map(cityChangeAction),
            eventStream.filter(actionIs('cityFormSubmit')).map(cityFormSubmitAction),
            eventStream.filter(actionIs('closeClicked')).map(closeClickedAction)
        ];

        // Stream that require catalog update via network
        const updateFilterStream = [
            eventStream.filter(actionIs('setPriceFilter')).map(priceChangeAction),
            eventStream.filter(actionIs('setCustomPriceFilter')).debounceTime(1000).distinctUntilChanged().map(priceRangeChangeAction),
            eventStream.filter(actionIs('setCityFilter')).map(cityFilterAction),
            eventStream.filter(actionIs('setSizeFilter')).map(sizeChangeAction),
            eventStream.filter(actionIs('setColorFilter')).map(colorChangeAction),
            eventStream.filter(actionIs('setConditionFilter')).map(conditionChangeAction),
            eventStream.filter(actionIs('brandChanged')).map(brandChangeAction),
            eventStream.filter(actionIs('clearAllFilters')).map(clearAllFiltersAction),

            // Make event from browser's back button
            Rx.Observable.fromEvent(window, 'popstate').map(function (event) {
                return ((state) => [event.state || state || {}]);
            }),

            // Make event from catalog sorting
            blackHoleEventStream.filter(actionIs('sortDirectionChanged')).map(sortingDirectionChangeAction),

            // Handle event from pagination buttons
            blackHoleEventStream.filter(actionIs('setPage')).map(setPageAction),

            // Handle event from clear selected filter value
            blackHoleEventStream.filter(actionIs('excludeFilterValue')).map(excludeFilterValueAction),
            blackHoleEventStream.filter(actionIs('clearFilterValue')).map(clearFilterValueAction),
            blackHoleEventStream.filter(actionIs('clearAllFilters')).map(clearAllFiltersAction),
            blackHoleEventStream.filter(actionIs('applySearchString')).map(applySearchStringAction)
        ];

        if (filtersContainer) {
            // Handle events that require filter update via network
            Rx.Observable
                .merge(...updateFilterStream)
                .scan(([state, effect], action) => action(state), [initialState])
                .startWith([initialState])
                .do(updateFilters)
                .do(fetchWithFilters)
                .flatMap(([state, effect]) => effect ? effect(initialState.config, eventStream, state) : Rx.Observable.empty())
                .subscribe(
                    () => {},
                    console.error.bind(console)
                );

            // Handle events that just change app state
            Rx.Observable
                .merge(...stateChangeStream)
                .scan(([state, effect], action) => action(state), [initialState])
                .startWith([initialState])
                .do(updateFilters)
                .flatMap(([state, effect]) => effect ? effect(initialState.config, eventStream, state) : Rx.Observable.empty())
                .subscribe(
                    () => {},
                    console.error.bind(console)
                );
        }

    }
}



// WEBPACK FOOTER //
// ./shafa/js/catalog/main.js