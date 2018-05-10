import Rx from 'rxjs/Rx';
import request from 'superagent';
import {toGetParams} from '../utils';


function gaLogFilterAction(eventCategory, eventAction, eventLabel) {
    if (eventLabel) {
        ga('send', 'event', eventCategory, eventAction, eventLabel);
    } else {
        ga('send', 'event', eventCategory, eventAction);
    }
}

export function addToHistory(config, eventStream, state) {
    if (Object.keys(state.FilterState).length > 0) {
        window.history.pushState(state, null, config.pjaxBaseUrl + toGetParams(state.FilterState));
    }
    return Rx.Observable.of(1);
}

export function priceChangeAction({id}) {
    return (state) => {
        state.FilterState.prices = state.FilterState.prices || [];
        let position = state.FilterState.prices.indexOf(id);
        if (position === -1) {
            state.FilterState.prices.push(id);
        } else {
            state.FilterState.prices.splice(position, 1);
        }
        state.FilterState.price_from = null;
        state.FilterState.price_to = null;
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'price', state.eventLabel);
        return [state, addToHistory];
    };
}

export function priceRangeChangeAction({price_from, price_to}) {
    return (state) => {
        state.FilterState.price_from = price_from;
        state.FilterState.price_to = price_to;
        state.FilterState.prices = [];
        state.pageNum = null;
        return [state, addToHistory];
    };
}

export function cityFilterAction(params) {
    return (state) => {
        if (state.FilterState.cities.indexOf(params.id) === -1) {
            state.FilterState.cities.push(params.id);
        } else {
            state.FilterState.cities.pop(params.id);
        }
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'city', state.eventLabel);
        return [state, addToHistory];
    }
}

export function sizeChangeAction(params) {
    return (state) => {
        state.FilterState.sizes = state.FilterState.sizes || [];
        let position = state.FilterState.sizes.indexOf(params.id);
        if (position === -1) {
            state.FilterState.sizes.push(params.id);
        } else {
            state.FilterState.sizes.splice(position, 1);
        }
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'size_id', state.eventLabel);
        return [state, addToHistory];
    }
}

export function colorChangeAction(params) {
    return (state) => {
        state.FilterState.colors = state.FilterState.colors || [];
        if (state.FilterState.colors.indexOf(params.id) === -1) {
            state.FilterState.colors.push(params.id);
        } else {
            state.FilterState.colors.splice(state.FilterState.colors.indexOf(params.id), 1);
        }
        // only two distinct colors allowed
        if (state.FilterState.colors.length > 2) {
            state.FilterState.colors.shift();
        }
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'color_id', state.eventLabel);
        return [state, addToHistory];
    }
}

export function conditionChangeAction(params) {
    return (state) => {
        state.FilterState.conditions = state.FilterState.conditions || [];
        let position = state.FilterState.conditions.indexOf(params.id);
        if (position === -1) {
            state.FilterState.conditions.push(params.id);
        } else {
            state.FilterState.conditions.splice(position, 1);
        }
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'status', state.eventLabel);
        return [state, addToHistory];
    }
}

export function brandChangeAction(params) {
    return (state) => {
        state.FilterState.brands = state.FilterState.brands || [];
        if (state.FilterState.brands.indexOf(params.id) === -1) {
            state.FilterState.brands.push(params.id);
        } else {
            state.FilterState.brands.splice(state.FilterState.brands.indexOf(params.id), 1);
        }
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'brand_id', state.eventLabel);
        return [state, addToHistory];
    }
}

export function clearAllFiltersAction(params) {
    return (state) => {
        state.FilterState.prices = [];
        state.FilterState.price_from = null;
        state.FilterState.price_to = null;
        state.FilterState.sizes = [];
        state.FilterState.colors = [];
        state.FilterState.conditions = [];
        state.FilterState.brands = [];
        state.FilterState.cities = [];
        state.FilterState.sort = null;
        state.FilterState.search_text = null;
        state.pageNum = null;
        return [state, addToHistory];
    }
}

export function brandInputChanged({eventStream, config, value}) {
    request
        .get(config.brandSearchUrl)
        .query({q: value})
        .end((err, res) => {
            eventStream.next({
                action: 'brandsSuggestReceived',
                brands: res.body.data
            })
        });
    return (state) => {
        state.brandSuggestionsIsLoading = true;
        return [state];
    };
}

export function brandsSuggestionsReceived({brands}) {
    return (state) => {
        state.brandSuggestionsIsLoading = false;
        state.brandSuggestions = brands;

        state.selectedBrands = Array.from(state.selectedBrands || []).concat(brands);
        return [state];
    }
}

export function sortingDirectionChangeAction({value}) {
    return (state) => {
        state.FilterState.sort = value;
        state.pageNum = null;
        gaLogFilterAction('Catalog Filter', 'change_sorting', state.eventLabel);
        return [state, addToHistory];
    }
}

export function setPageAction({page}) {
    return (state) => {
        if (page == 1) {
            state.pageNum = null;
        } else {
            state.pageNum = page;
        }
        gaLogFilterAction('Pagination', state.eventLabel, page || 1);
        return [state, addToHistory];
    }
}

export function clearFilterValueAction({filterName}) {
    return (state) => {
        state.FilterState[filterName] = null;
        return [state, addToHistory];
    }
}

export function excludeFilterValueAction({filterName, filterValue}) {
    return (state) => {
        if (state.FilterState[filterName]) {
            let index = state.FilterState[filterName].indexOf(filterValue);
            if (index != -1 ) {
                state.FilterState[filterName].splice(index, 1);
            }
        }
        return [state, addToHistory];
    }
}

export function applySearchStringAction({searchString}) {
    return (state) => {
        state.FilterState.search_text = searchString;
        state.pageNum = null;
        return [state, addToHistory];
    }
}

export function closeClickedAction() {
    return (state) => {
        state.isCityModalOpen = false;
        return [state];
    }
}

export function cityChangeAction() {
    return (state) => {
        state.isCityModalOpen = true;
        return [state];
    }
}

export function cityFormSubmitAction({config, componentState}) {
    request
        .post(config.cityChangeUrl)
        .type('form')
        .send({csrfmiddlewaretoken: config.csrfToken})
        .send(componentState)
        .end(function (err, res) {
            window.location.reload();
        });
    return (state) => {
        return [state];
    }
}



// WEBPACK FOOTER //
// ./shafa/js/catalog/actions.js