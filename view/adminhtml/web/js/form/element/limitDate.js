/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define(function () {
    'use strict';

    return {
        defaults: {
            options: {
                timeInput: true,
                timeFormat: 'HH:mm:ss',
                showsTime: true,

                firstDay: 0,
                beforeShowDay: function(d) {
                    if (d.getDate() >= 8 && d.getDate() <= 12) {
                        return [true, "" ];
                    } else {
                        return [false, "" ];
                    }
                }
            },
        },
    };
});
