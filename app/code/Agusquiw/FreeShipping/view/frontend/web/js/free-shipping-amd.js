define([
    'jquery',
    'Magento_Customer/js/customer-data',
], ($, customerData) => {
    'use strict';

    return (config, elem) => {
        const freeShippingObservable = customerData.get('free-shipping');

        const updateContents = (messages) => {
            let contents = '';

            for (const message of messages) {
                contents += `<span>${message}</span>`;
            }

            $(elem).html(contents);
        };

        updateContents(freeShippingObservable()['messages']);
    };
});
