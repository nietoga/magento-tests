define(['jquery'], function ($) {
    'use strict';

    return function (widget) {
        $.widget('mage.catalogAddToCart', widget, {
            _create: function () {
                if (this.options.bindSubmit) {
                    this._bindSubmit();
                }
                this.element.find(this.options.addToCartButtonSelector).attr('disabled', false);
            }
        });

        return $.mage.catalogAddToCart;
    };
});
