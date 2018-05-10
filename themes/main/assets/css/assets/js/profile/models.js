//@flow
import {AppState} from '../bootstrap';

export type Config = {}
export type Member = {}

export class FollowButtonAppState extends AppState {

    config: Config;
    member: Member;
    urlCreate: string;
    urlDestroy: string;
    isSubscribed: boolean;
    isSubmitting: boolean;

    getState() {
        super.getState();
        this.urlCreate = this.__raw_data.followButtonData.urlCreate;
        this.urlDestroy = this.__raw_data.followButtonData.urlDestroy;
        this.isSubscribed = this.__raw_data.followButtonData.isSubscribed;
        this.isSubmitting = false;
        return this;
    }
}

export class ComplainLinkAppState extends AppState {
    config: Config;
    member: Member;
    product: any;
    url: string;
    form: {
        choices: Array<any>,
        errors: any,
        type: string,
        text: string
    };
    location: string|null;
    isModalOpen: boolean;
    isSucceeded: boolean;
    isSubmitting: boolean;

    getState() {
        super.getState();
        this.url = this.__raw_data.complainLinkData.url;
        this.form = {
            choices: [],
            errors: {},
            type: '',
            text: ''
        };
        this.location = null;
        this.isModalOpen = false;
        this.isSucceeded = false;
        this.isSubmitting = false;
        return this;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/profile/models.js