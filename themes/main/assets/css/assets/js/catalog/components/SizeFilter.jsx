import React from 'react';
import classNames from 'classnames';


export default class SizeFilter extends React.Component {

    constructor(props) {
        super(props);
        this.state = {isActive: true};
    }

    handleToggle() {
        this.setState({
            'isActive': !this.state.isActive
        })
    }

    render() {
        return <div className={classNames('b-filter__section',
                                         {'b-filter__section_state_active': this.state.isActive})}>
            <p className="b-filter__title" onClick={this.handleToggle.bind(this)}>Размер</p>

            <ul className="b-filter__content b-cell-list">
                {
                    this.props.filters.map((filter) => {
                        let isChecked = this.props.checked.indexOf(filter.id) !== -1;
                        return <li className="b-cell-list__item"
                                   key={filter.id}>
                            <input type="checkbox"
                                   id={'size-' + filter.id}
                                   className="b-cell-list__input"
                                   name="size"
                                   checked={isChecked}
                                   onChange={this.handleSizeChanged.bind(this, filter.id)}/>
                            <label className="b-cell-list__label"
                                   htmlFor={'size-' + filter.id}>
                                {filter.title_short}
                            </label>
                        </li>
                    })
                }
            </ul>
        </div>;
    }

    handleSizeChanged(id) {
        this.props.eventStream.next({
            action: 'setSizeFilter',
            id: id
        })
    }
}


// WEBPACK FOOTER //
// ./shafa/js/catalog/components/SizeFilter.jsx