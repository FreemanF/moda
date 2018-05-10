//@flow
import React from 'react';
import classNames from 'classnames';


type Props = {
    eventStream: Rx.Observable,
    isSubscribed: boolean;
    isSubmitting: boolean;
    classnamesPrimary: string;
    classnamesSubscribed: string;
    classnamesUnsubscribed: string;
}

export default class FollowButton extends React.Component<void, Props, void> {

    handleClick(e: Event) {
        e.preventDefault();
        this.props.eventStream.next({
            action: 'followButtonClicked',
            eventStream: this.props.eventStream,
            data: this.props
        });
    }

    render() {
        let {isSubscribed, classnamesPrimary, classnamesSubscribed, classnamesUnsubscribed} = this.props;
        let btn_cls = [classnamesPrimary];

        if (isSubscribed) {
            btn_cls.push(classnamesSubscribed);
        } else {
            btn_cls.push(classnamesUnsubscribed);
        }

        return <button href="#" rel="nofollow" disabled={this.props.isSubmitting}
                  className={classNames(btn_cls)}
                  onClick={this.handleClick.bind(this)}>{isSubscribed ? 'Подписаны' : 'Подписаться'}</button>;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/profile/components/FollowButton.jsx