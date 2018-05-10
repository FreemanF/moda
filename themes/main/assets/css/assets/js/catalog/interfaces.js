export const IMPLEMENTATIONS = {
    '.js-catalog-pagination': function (document, selector, eventStream) {
        $(document).on('click', selector, function (event) {
            event.preventDefault();
            let page = parseInt(event.target.getAttribute('data-page'));
            if (page) {
                eventStream.next({
                    action: "setPage",
                    page: page
                });
            }

        })
    },

    '.js-catalog-sorting': function (document, selector, eventStream) {
        $(document).on('change', selector, function (event) {
            eventStream.next({
                action: "sortDirectionChanged",
                value: event.target.value
            });
        })
    },

    '.js-catalog-filter-remove': function (document, selector, eventStream) {
        $(document).on('click', selector, function (event) {
            event.preventDefault();
            // If `data-value` is present - delete single value from filter,
            // if not - delete whole filter `filterName`
            let dataValue =  event.currentTarget.getAttribute('data-value');
            if (dataValue) {
                eventStream.next({
                    eventStream: eventStream,
                    action: "excludeFilterValue",
                    filterName: event.currentTarget.getAttribute('data-name'),
                    filterValue: parseInt(dataValue)
                });
            } else {
                eventStream.next({
                    eventStream: eventStream,
                    action: "clearFilterValue",
                    filterName: event.currentTarget.getAttribute('data-name')
                });
            }
        })
    },
    
    '.js-catalog-filter-remove-all': function (document, selector, eventStream) {
        $(document).on('click', selector, function (event) {
            event.preventDefault();
            eventStream.next({
                eventStream: eventStream,
                action: "clearAllFilters"
            });
        })
    },

    '.js-catalog-search-submit': function (document, selector, eventStream) {
        $(document).on('click', selector, function (event) {
            event.preventDefault();
            eventStream.next({
                eventStream: eventStream,
                action: "applySearchString",
                searchString: $('.js-catalog-search-input').val()
            });
        })
    }
};

export function bindInterfaces(document, eventStream) {
    Array.from(Object.keys(IMPLEMENTATIONS)).map((selector) => {
        let fn = IMPLEMENTATIONS[selector];
        fn(document, selector, eventStream);
    });
}


// WEBPACK FOOTER //
// ./shafa/js/catalog/interfaces.js