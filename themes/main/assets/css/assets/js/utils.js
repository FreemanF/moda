import {resolve} from 'url';
import React from 'react';


export function staticfile(path) {
    return resolve(window.staticUrl, path);
}

export function flatten(list) {
    return list.reduce(
        (a, b) => a.concat(Array.isArray(b) ? flatten(b) : b), []
    );
}

export function actionIs(name) {
    return ({action}) => name === action;
}

export function convertHex(hex, opacity) {
    hex = hex.replace('#', '');
    let r = parseInt(hex.substring(0, 2), 16);
    let g = parseInt(hex.substring(2, 4), 16);
    let b = parseInt(hex.substring(4, 6), 16);

    return 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
}

export function getParamFromMetaTag(name) {
    let el = document.getElementsByName(name);
    return el ? el[0].content : null;
}


export function toGetParams(obj) {
    let q = [];
    Object.keys(obj)
        .map((k) => [k, obj[k]])
        .filter(([_, v]) => v !== null && v !== '' && typeof v !== 'undefined')
        .map(function ([k, v]) {
            if (Array.isArray(v)) {
                Array.from(v)
                    .filter((i) => (i !== null && i !== '' && typeof i !== 'undefined'))
                    .map(function(i) {
                        q.push(encodeURIComponent(k) + "=" + encodeURIComponent(i));
                    })
            } else {
                q.push(encodeURIComponent(k) + "=" + encodeURIComponent(v));
            }
        });
    let getParams = q.join('&');

    return getParams ? '?' + getParams : '';
}


export function decodeHTML(escapedHtml) {
    var escapeEl = document.createElement('textarea');
    escapeEl.innerHTML = escapedHtml;
    return escapeEl.textContent;
}


export function svgContent(name) {
    return {__html: '<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' + window.spriteUrl + name + '"></use>'};
}

export function rupluralize(value, variants) {
    let amount = Math.abs(value);

    if (amount % 10 == 1 && amount % 100 != 11) {
        return variants[0];
    }
    if (amount % 10 >= 2 && amount % 10 <= 4 && (amount % 100 < 10 || amount % 100 >= 20)) {
        return variants[1];
    }
    return variants[2];
}



// WEBPACK FOOTER //
// ./shafa/js/utils.js