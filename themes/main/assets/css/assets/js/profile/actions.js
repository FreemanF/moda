//@flow
import request from 'superagent';
import {FollowButtonAppState, ComplainLinkAppState} from './models';


export function followButtonClicked({eventStream, data}: {eventStream: any, data: any}) {
    let url = data.isSubscribed ? data.urlDestroy : data.urlCreate;
    let post_data = data.isSubscribed ? {user_id: data.member.id} : {to_user: data.member.id};

    request
        .post(url)
        .type('form')
        .send({csrfmiddlewaretoken: data.config.csrfToken})
        .send(post_data)
        .end(function (err, res) {
            eventStream.next({
                action: 'followButtonClickedResponseReceived',
                response: res
            })
        });
    return (state: FollowButtonAppState) => {
        state.isSubmitting = true;
        return state;
    }
}

export function followButtonClickedResponseReceived({response}: {response: any}) {
    return (state: FollowButtonAppState) => {
        if (response && response.ok && response.body) {
            state.isSubscribed = !state.isSubscribed;
        }
        state.isSubmitting = false;
        return state;
    }
}

export function complainLinkClicked({eventStream, data}: {eventStream: any, data: any}) {
    request
        .get(data.url)
        .query({id: data.member.id})
        .end(function (err, res) {
            eventStream.next({
                action: 'complainLinkClickedResponseReceived',
                response: res
            })
        });
    return (state: ComplainLinkAppState) => {
        return state;
    }
}

export function complainLinkClickedResponseReceived({response}: {response: any}) {
    return (state: ComplainLinkAppState) => {
        if (response && response.ok && response.body) {
            state.form.choices = response.body.choices;
            state.isModalOpen = true;
        }
        return state;
    }
}

export function complainFormSubmit({eventStream, data, componentState}:
                                       {eventStream: any, data: any, componentState: any}) {
    request
        .post(data.url)
        .type('form')
        .send({csrfmiddlewaretoken: data.config.csrfToken})
        .send({
            user: data.member.id,
            product: data.product ? data.product.id : null,
            type: componentState.type,
            text: componentState.text
        })
        .end(function (err, res) {
            eventStream.next({
                action: 'complainFormSubmitResponseReceived',
                response: res
            })
        });
    return (state: ComplainLinkAppState) => {
        state.isSubmitting = true;
        return state;
    }
}

export function complainFormSubmitResponseReceived({response}: {response: any}) {
    return (state: ComplainLinkAppState) => {
        if (response && response.ok && response.body) {
            if (response.body.errors) {
                state.form.errors = response.body.errors;
            } else {
                state.isSucceeded = true;
            }
        }
        state.isSubmitting = false;
        return state;
    }
}

export function closeClicked() {
    return (state: ComplainLinkAppState) => {
        state.isModalOpen = false;
        return state;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/profile/actions.js