import React from 'react';


export default class CityForm extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            city_id: this.props.cityId
        };
    }

    onSubmit(e) {
        e.preventDefault();
        this.props.eventStream.next({
            action: 'cityFormSubmit',
            eventStream: this.props.eventStream,
            config: this.props.config,
            componentState: this.state
        });
    }

    handleChange(e) {
        this.setState({city_id: e.currentTarget.value});
    }

    render() {
        return <div className="b-inline">
            <h4 className="b-title">Укажите, пожалуйста, ваш город</h4>
            <p className="b-modal__paragraph">Мы сможем найти интересные предложения от продавцов из вашего города</p>
            <form className="b-settings" method="post" onSubmit={this.onSubmit.bind(this)}>
                <div className="b-form-row">
                    <label className="b-settings__label" htmlFor="city">Город</label>
                    <div className="b-form-select">
                        <select className="b-form-select__list" name="city_id" id="city"
                                defaultValue={this.props.cityId}
                                onChange={this.handleChange.bind(this)}>
                        <option>Выберите город</option>
                        {this.props.cities.map((function(city) {
                            return <option value={city.id } key={city.id}>
                                {city.name}
                            </option>
                        }).bind(this))}
                        </select>
                    </div>
                </div>
                <button className="b-button b-button_pull_right" type="submit">Продолжить</button>
            </form>
        </div>;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/tutorial/components/CityForm.jsx