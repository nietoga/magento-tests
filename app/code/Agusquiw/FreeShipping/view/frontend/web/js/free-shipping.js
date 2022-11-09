define([
    'uiComponent',
    'Magento_Customer/js/customer-data',
], function (Component, customerData) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Agusquiw_FreeShipping/free-shipping'
        },
        initialize: function () {
            this._super();
            this.messages = customerData.get('free-shipping')()['messages'];
        }
    });
});
