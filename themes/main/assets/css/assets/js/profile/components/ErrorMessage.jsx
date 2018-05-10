import React from 'react';


export default class ErrorMessage extends React.Component {
    render() {
        if (!Array.isArray(this.props.errors)) {
            return null;
        }

        return <div className="b-inline">
            {this.props.errors.filter(err => err).map((error, i) => {
                return <div className="b-form-error" key={i} aria-expanded="true">{error.message}</div>;
                })}
        </div>;
    }
}



// WEBPACK FOOTER //
// ./shafa/js/profile/components/ErrorMessage.jsx