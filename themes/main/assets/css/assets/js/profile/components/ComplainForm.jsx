//@flow
import React from 'react';
import ErrorMessage from '../components/ErrorMessage';


type Props = {
    eventStream: any;
    product: any;
    member: any;
    form: any;
}

type State = {
    text: string;
    type: string;
}


export default class ComplainForm extends React.Component<void, Props, State> {
    state: State;

    onClose() {
        this.props.eventStream.next({
            action: 'closeClicked',
            eventStream: this.props.eventStream
        });
    }

    onSubmit(e: Event) {
        e.preventDefault();
        this.props.eventStream.next({
            action: 'complainFormSubmit',
            eventStream: this.props.eventStream,
            data: this.props,
            componentState: this.state || {type: '', text: ''}
        });
    }

    handleChange(e: Event & { currentTarget: HTMLInputElement }) {
        if (e.currentTarget.name == 'text') {
            this.setState({'text': e.currentTarget.value});
        } else if (e.currentTarget.name == 'type') {
            this.setState({'type': e.currentTarget.value});
        }
    }

    render() {
        if (this.props.isSucceeded) {
            return <div className="b-inline">
                <h4 className="b-title">Спасибо!</h4>

                <p className="b-modal__paragraph">Ваша жалоба отправлена, принята в работу и будет рассмотрена в течение 3х дней.<br/>
                    Не нужно отправлять повторные жалобы, это не ускорит процесс.<br/>
                    Мы обязательно свяжемся с пользователем, на которого вы пожаловались, для решения вопроса.<br/>
                </p>

                <button className="b-button b-button_pull_right" onClick={this.onClose.bind(this)}>Продолжить</button>
            </div>;
        }

        let title;
        if (this.props.product) {
            title = 'Пожаловаться на объявление &laquo;<strong>' + this.props.product.name + '</strong>&raquo;';
        } else {
            title = 'Пожаловаться на пользователя &laquo;<strong>' + this.props.member.username + '</strong>&raquo;';
        }

        return <div className="b-inline">
            <h4 className="b-title">Отправить жалобу</h4>

            <p className="b-modal__paragraph" dangerouslySetInnerHTML={{__html: title}}></p>

            <form method="post" onSubmit={this.onSubmit.bind(this)}>
                <div className="b-form-row">
                    <ul className="b-simple-list">
                        {this.props.form.choices.map((function(choice) {
                            return <li className="b-simple-list__item" key={choice.type}>
                                <input name="type" value={choice.type}
                                        id={"radio-" + choice.type} type="radio"
                                        className="b-form-check-input"
                                        onChange={this.handleChange.bind(this)}/>
                                <label htmlFor={"radio-" + choice.type} className="b-form-radio">
                                    {choice.name}
                                </label>
                            </li>
                        }).bind(this))}
                    </ul>
                    <ErrorMessage errors={this.props.form.errors.type}/>
                </div>
                <div className="b-form-row">
                    <label htmlFor="text">Комментарий (обязательно к заполнению)</label>
                    <textarea name="text" id="text" className="b-form-textarea"
                              onChange={this.handleChange.bind(this)}></textarea>
                    <ErrorMessage errors={this.props.form.errors.text}/>
                </div>
                <button className="b-button-bordered b-button-bordered_lh_24" type="button" onClick={this.onClose.bind(this)}>Отмена</button>
                <button className="b-button b-button_pull_right" type="submit">Отправить</button>
            </form>
        </div>;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/profile/components/ComplainForm.jsx