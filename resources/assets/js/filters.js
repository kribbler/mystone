/*global angular, marked*/
(function (angular) {

  "use strict";

  angular.module('mainWebsite')
    .filter(
      'coreCurrency',
      ['currencyFilter',
        function (currencyFilter) {
          return function (amount, symbol) {
            amount = Math.round(amount * 100) / 100;
            symbol = symbol || '£';
            if (isNaN(amount)) {
              amount = 0;
            }
            if (amount < 0) {
              return amount * -1 + '%';
            }
            return currencyFilter(amount, symbol);
          };
        }
      ]
    );

}(angular));
