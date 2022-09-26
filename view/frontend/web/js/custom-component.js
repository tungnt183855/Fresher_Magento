define(['jquery', 'uiComponent', 'ko'], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Magenest_Movie/knockout-background-color'
            },
            initialize: function () {
                this.color = ko.observable();
                this._super();
                this.colorOptions = this.colorConfig;
            },
            getColorChosen: function () {
                var count = 0;
                if(count === 0){
                    count++;
                    return 'blue';
                }else{
                    return 'green';
                }
                // return this.color();
            }
        });
    }
);
