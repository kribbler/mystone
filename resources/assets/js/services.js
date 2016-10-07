/*global angular*/
(function (angular) {

  "use strict";

  /**
   * Service used to paginate results
   */
  angular.module('mainWebsite').factory('pagination', ['$http', function ($http) {
    return {
      init: function (scope, url) {

        scope.applyFilter = function () {
          scope.currentPage = 1;
          scope.getItems();
        };

        scope.resetFilter = function () {
          scope.currentPage = 1;
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

          filter.page = scope.currentPage;
          filter._ = new Date().getTime();
          return filter;
        };

        //Pagination
        scope.totalItems = 0;
        scope.totalPages = 0;
        scope.currentPage = 1;
        scope.maxSize = 1;
        scope.paginatorLoading = false;

        scope.setMaxSize = function (count, limit) {
          var maxSize = Math.ceil(count / limit);
          if (maxSize > 7) {
            maxSize = 7;
          }
          scope.maxSize = maxSize;
        };

        //Selection
        scope.allSelected = false;
        scope.selectAllChanged = function () {
          scope.allSelected = !scope.allSelected;
          angular.forEach(scope.items, function (item) {
            if (scope.itemSelectable(item)) {
              item.selected = scope.allSelected;
            }
          });
        };

        scope.itemSelectable = function () {
          return true;
        };

        scope.selectedCount = function () {
          var count = 0;
          angular.forEach(scope.items, function (item) {
            if (item.selected) {
              count += 1;
            }
          });
          return count;
        };

        scope.getSelectedIds = function () {
          return scope.items.filter(function (a) {
            return a.selected;
          }).map(function (a) {
            return a.id;
          });
        };

        scope.getItems = function () {
          scope.disableInitialLoad = false;
          scope.paginatorLoading = true;

          //Load the initial set in
          $http({method: 'GET', url: url, params: scope.getFilter()}).success(function (res) {
            angular.forEach(res, function (value, key) {
              switch (key) {
              case 'count':
                scope.totalItems = value;
                break;
              case 'limit':
                scope.itemsPerPage = value;
                break;
              default:
                scope[key] = value;
                break;
              }
            });

            scope.totalPages = Math.ceil(scope.totalItems / scope.itemsPerPage);
            scope.setMaxSize(res.count, res.limit);
            scope.paginatorLoading = false;
          });
        };

        scope.pageChanged = function () {
          scope.getItems();
          scope.allSelected = false;
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

  angular.module('mainWebsite').service('formUpload', ['$http', function ($http) {
    this.up = function (formData, url) {
      var fd = new FormData();
      angular.forEach(formData, function (value, index) {
        fd.append(index, value);
      });

      return $http({
        url: url,
        method: 'POST',
        headers: {'Content-Type': undefined},
        data: fd,
        transformRequest: angular.identity
      });
    };
  }]);

}(angular));
