/* js/app.js */

(function() {

    'use strict';

    angular
        .module('mainWebsite', [
            'ngResource',
            'ngFileUpload',
            'ui.bootstrap',
            'ui.grid',
            'ui.grid.exporter',
            'ui.grid.pagination',
            'xeditable',
            'ngAnimate',
            'ngMaterial',
            'toastr'
        ], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        })
        .run(function(editableOptions) {
          editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
        });
        

    angular.module('mainWebsite').factory('pagination', ['$http', function ($http) {
    return {
      init: function (scope, url) {
        scope.applyFilter = function () {
            console.log('filtering....');
          scope.current_page = 1;
          scope.getItems();
        };

        scope.resetFilter = function () {
          scope.current_page = 1;
          scope.filter = {};
          scope.getItems();
        };

        scope.getFilter = function () {
          var filter = {},
            prop;

          //If it's an array we add [] to indicate to Backend
          for (prop in scope.defaultFilter) {
            if (scope.defaultFilter.hasOwnProperty(prop)) {
              filter[prop + (angular.isArray(scope.defaultFilter[prop]) ? '[]' : '')] = scope.defaultFilter[prop];
            }
          }
          for (prop in scope.filter) {
            if (scope.filter.hasOwnProperty(prop)) {
              filter[prop + (angular.isArray(scope.filter[prop]) ? '[]' : '')] = scope.filter[prop];
            }
          }

          filter.page = scope.current_page;
          filter._ = new Date().getTime();
          return filter;
        };

        //Pagination
        scope.total = 0;
        scope.last_page = 0;
        scope.current_page = 1;
        scope.maxSize = 1;
        scope.paginatorLoading = false;
        scope.got_filtered_data = false;

        scope.setMaxSize = function (count, limit) {
          var maxSize = Math.ceil(count / limit);
          if (maxSize > 7) {
            maxSize = 7;
          }
          scope.maxSize = maxSize;
        };

        scope.getItems = function () {
          scope.disableInitialLoad = false;
          scope.paginatorLoading = true;
          //Load the initial set in
          $http({method: 'GET', url: url, params: scope.getFilter()}).success(function (res) {
            angular.forEach(res, function (value, key) {
              switch (key) {
              case 'count':
                scope.total = value;
                break;
              case 'per_page':
                scope.per_page = value;
                break;
              default:
                scope[key] = value;
                break;
              }
            });
            scope.last_page = Math.ceil(scope.total / scope.per_page);
            scope.setMaxSize(res.count, res.per_page);
            scope.paginatorLoading = false;
            scope.got_filtered_data = (scope.last_page > 0) ? true : false;
          });
        };

        scope.pageChanged = function () {
          scope.getItems();
        };

        //Loads the initial set of items based on the ng-init filter settings
        scope.$watch('defaultFilter', function () {
          var urlParams = location.search.substr(1).split("&"),
            filter = {};

          if (urlParams.length && urlParams[0].length) {
            urlParams.forEach(function (item) {
              filter[item.split("=")[0]] = item.split("=")[1];
            });
          }

          scope.filter = filter;

          if (scope.disableInitialLoad !== true) {
            scope.getItems();
          }
        });
      }
    };
  }]);
})();