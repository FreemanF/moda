//@flow
import React from 'react';
import Modal from 'react-modal';
import classNames from 'classnames';
import ComplainForm from '../components/ComplainForm';
import {svgContent} from '../../utils';


export default class ComplainLink extends React.Component {
    handleClick(e: Event) {
        e.preventDefault();
        this.props.eventStream.next({
            action: 'complainLinkClicked',
            eventStream: this.props.eventStream,
            data: this.props
        });
    }

    onClose() {
        this.props.eventStream.next({
            action: 'closeClicked',
            eventStream: this.props.eventStream
        });
    }

    render () {
        return <div className="b-inline">
            <a className={classNames("b-warning-link", {"b-tabs__link" : this.props.location == 'profile'})} onClick={this.handleClick.bind(this)} href="#" rel="nofollow">
                <svg className={classNames("b-warning-link__icon", {"b-tabs__icon" : this.props.location == 'profile'})} dangerouslySetInnerHTML={svgContent('#static--svg--message-warning')}></svg>
                <span className="b-warning-link__text">Пожаловаться</span>
            </a>

            <Modal
                isOpen={this.props.isModalOpen}
                onRequestClose={this.onClose.bind(this)}
                contentLabel="Modal"
                className="b-modal b-modal_maxw_300"
                overlayClassName="b-modal__overlay">

                <ComplainForm
                    eventStream={this.props.eventStream}
                    {...this.props}/>
            </Modal>
        </div>;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/profile/components/ComplainLink.jsx