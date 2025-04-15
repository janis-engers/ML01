/**
 * This file is part of the Magebit package.
 *
 * @copyright Copyright (c) 2025 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: './input-counter.html',
            params: {
                value: 1,
                min: 1,
                id: 'qty',
                name: 'qty',
                title: 'Quantity',
                validate: JSON.stringify({'validate-number': true})
            }
        },

        initialize: function () {
            this._super();
            this.qty = ko.observable(this.params.value * 1);
        },

        increment: function () {
            this.qty(this.qty() + 1);
        },

        decrement: function () {
            if (this.qty() > 1) {
                this.qty(this.qty() - 1);
            }
        }
    });
});
