define([
    'uiComponent',
    'ko',
], function (Component, ko) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Mts_Tests/counter'
        },
        initialize: function () {
            this._super();
            this.value = ko.observable(0);
        },
        incrementValue: function () {
            this.value(this.value() + 1);
        },
        decrementValue: function () {
            this.value(this.value() - 1);
        },
    });
});
