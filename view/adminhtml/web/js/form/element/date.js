/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'Magento_Ui/js/form/element/date',
    'Magenest_Movie/js/form/element/limitDate'
], function (Element, limitDate) {
    'use strict';

    return Element.extend(limitDate);
});
