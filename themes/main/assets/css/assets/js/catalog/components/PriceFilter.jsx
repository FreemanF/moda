import React from 'react';
import classNames from 'classnames';


export default class PriceFilter extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            isActive: true,
            price_from: this.props.from,
            price_to: this.props.to
        }
    }

    handleToggle() {
        this.setState({isActive: !this.state.isActive})
    }

    renderCostRangeItems() {
        return this.props.filters.map(
            (filter, i) => {
                let isChecked = this.props.checked && this.props.checked.indexOf(filter.id) !== -1;

                return <li className="b-simple-list__item" key={`cost-range-${i}`}>
                    <input
                        id={`cost-range-${i}`}
                        name="cost"
                        type="checkbox"
                        className="b-form-check-input"
                        checked={isChecked}
                        onChange={this.handlePriceChanged.bind(this, filter.id)}
                    />
                    <label
                        htmlFor={`cost-range-${i}`}
                        className="b-form-checkbox">
                        {filter.name}
                    </label>
                </li>;
            });
    }

    render() {
        let cls = classNames({
            'b-filter__section': true,
            'b-filter__section_state_active': this.state.isActive
        });
        return <div id="filter-price" className={cls}>
            <p className="b-filter__title" onClick={this.handleToggle.bind(this)}>Цена</p>
            <div className="b-filter__content">
                <ul className="b-filter__list b-simple-list">
                    {this.renderCostRangeItems()}
                </ul>
                <div className="b-filter__row">
                    <label className="b-filter__label" htmlFor="cost-from">От</label>
                    <div className="b-filter__input">
                        <input
                            id="cost-from"
                            className="b-form-input"
                            ref="price_from"
                            name="costFrom"
                            type="text"
                            value={this.state.price_from || ''}
                            onChange={this.handleCustomPriceSet.bind(this)}/>
                    </div>
                </div>
                <div className="b-filter__row">
                    <label className="b-filter__label" htmlFor="cost-to">До</label>
                    <div className="b-filter__input">
                        <input
                            id="cost-to"
                            className="b-form-input"
                            ref="price_to"
                            name="costTo"
                            type="text"
                            value={this.state.price_to || ''}
                            onChange={this.handleCustomPriceSet.bind(this)}/>
                    </div>
                </div>
            </div>
        </div>;
    }

    handlePriceChanged(id) {
        this.props.eventStream.next({
            action: 'setPriceFilter',
            id: id
        })
    }

    handleCustomPriceSet(e) {
        e.preventDefault();
        let price_from = parseInt(this.refs.price_from.value) || null;
        let price_to = parseInt(this.refs.price_to.value) || null;
        // Use react's state to avoid UI glitch from using 
        // debounce over Rx stream of keyup event
        this.setState({
            price_from: price_from,
            price_to: price_to
        });
        this.props.eventStream.next({
            action: 'setCustomPriceFilter',
            price_from: price_from,
            price_to: price_to
        })
    }
}


// WEBPACK FOOTER //
// ./shafa/js/catalog/components/PriceFilter.jsx