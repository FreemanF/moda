import React from 'react'
import classNames from 'classnames';


export default class ConditionFilter extends React.Component {

    constructor(props) {
        super(props);
        this.state = {isActive: true}
    }

    handleToggle() {
        this.setState({isActive: !this.state.isActive})
    }

    render() {
        let cls = classNames({
            'b-filter__section': true,
            'b-filter__section_state_active': this.state.isActive
        });

        return <div className={cls}>
            <p className="b-filter__title" onClick={this.handleToggle.bind(this)}>Состояние</p>
            <ul className="b-filter__content b-simple-list">
                {
                    this.props.filters.map((filter) => {
                        let isChecked = this.props.checked.indexOf(filter.id) !== -1;
                        return <li key={filter.id} className="b-simple-list__item">
                            <input type="checkbox"
                                   id={`used-${filter.id}`}
                                   className="b-form-check-input"
                                   checked={isChecked}
                                   onChange={this.handleConditionChanged.bind(this, filter.id)}/>
                            <label htmlFor={`used-${filter.id}`}
                                   className="b-form-checkbox">
                                {filter.name}
                            </label>
                        </li>
                    })
                }
            </ul>
        </div>;
    }


    handleConditionChanged(id) {
        this.props.eventStream.next({
            action: 'setConditionFilter',
            id: id
        })
    }

}


// WEBPACK FOOTER //
// ./shafa/js/catalog/components/ConditionFilter.jsx