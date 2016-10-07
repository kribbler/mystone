(function (angular) {

  "use strict";

  var partialsDir = '/partials/';

  /*jslint unparam: true*/
  angular.module('mainWebsite')
    .directive('paginatorInfo', function () {
      return {
        template: 'Page {{current_page}} of {{last_page}}, showing {{per_page}} records out of {{total}} total'
      };
    })
    .directive('fileModel', ['$parse', function ($parse) {
      return {
        restrict: 'A',
        link: function (scope, el, attrs) {
          var model = $parse(attrs.fileModel);
          var modelSetter = model.assign;

          el.bind('change', function () {
            scope.$apply(function () {
              modelSetter(scope, el[0].files[0]);
            });
          });
        }
      };
    }])
    .directive('urlConfirm', ['$modal', function ($modal) {
      return {
        restrict: 'A',
        link: function (scope, el, attrs) {
          el.bind('click', function (e) {
            e.preventDefault();

            $modal.open({
              templateUrl: '/modals/url-confirm.html',
              controller: 'UrlConfirmCtrl',
              resolve: {
                url: function () {
                  return attrs.href;
                }
              }
            });
          });
        }
      };
    }])
    .directive('policiesIndex', function () {
      return {
        restrict: 'E',
        templateUrl: partialsDir + 'policies8.html'
      };
    })
    .directive('fileDownload', function ($compile) {
      var fd = {
          restrict: 'A',
          link: function (scope, iElement, iAttrs) {

              scope.$on("downloadFile", function (e, url) {
                  var iFrame = iElement.find("iframe");
                  if (!(iFrame && iFrame.length > 0)) {
                      iFrame = $("<iframe style='position:fixed;display:none;top:-1px;left:-1px;'/>");
                      iElement.append(iFrame);
                  }

                  iFrame.attr("src", url);


              });
          }
      };

      return fd;
  });
  /*jslint unparam: false*/

}(angular));
