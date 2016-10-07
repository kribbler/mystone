/* js/controllers/Home.js */
    
(function() {

    'use strict';
    
    angular
        .module('mainWebsite')
        .controller('Home', Home)
        .controller('ContactForm', ['$http', ContactForm])
        .controller(
            'Policies', 
            ['$scope', '$http', '$window', 'pagination', 
                function ($scope, $http, $window, pagination) {
                    pagination.init($scope, '/admin/policies.json');
                    $scope.limits = ['100', '500', '1000', '1500'];
                    
                    $scope.download_filtered_data = function() {
                        $http({method: 'GET', url: '/admin/policies/generatePoliciesCsv', params: $scope.getFilter()}).success(function (res) {
                            $window.open('/uploads/' + res, '_blank');
                        });
                        console.log($scope.getFilter());
                    }
                    console.log($scope.got_filtered_data);
                }
            ])
        .controller('PolicyView', ['$scope', '$http', '$window', PolicyView]);

        function Home()
        {
            //
        }

        function PolicyView($scope, $http, $window) {
            $scope.goBack = function(){
                $window.location.href = '/admin/policies';
            };
        }



        function ContactForm($http)
        {
            var vm = this;

            vm.contact_form_success = '';
            vm.contact_form_error = '';

            vm.numOptions = 10;

            vm.range = function(min, max, step) {
                step = step || 1;
                var input = [];
                for (var i = min; i <= max; i += step) input.push(i);
                return input;
            };

            vm.gridOptions = {
                enableFiltering: true,
                enablePaginationControls: false,
                paginationPageSize: vm.numOptions,
                enableHorizontalScrollbar: 0,
                enableVerticalScrollbar: 0,
                rowHeight: 40,
                data: [],
                columnDefs: [
                    {field: 'id', width: '8%'},
                    {field: 'name', width: '18%'},
                    {field: 'email', width: '25%'},
                    {field: 'env', width: '25%'},
                    {
                        field: 'transferred',
                        cellTemplate: '<div ng-if="row.entity.transferred == 1" class="text-success ui-grid-cell-contents"> <i class="fa fa-check custom-qa-size"></i></div><div ng-if="row.entity.transferred == 0" class="text-danger ui-grid-cell-contents"> <i class="fa fa-times custom-qa-size"></i></div>'
                    },
                    {
                        field: 'view',
                        cellTemplate: '<div class="ui-btn-holder"><a href="/admin/contact/<% row.entity.id %>" class="btn-u">View</a></div>'
                    },
                ]
            }

            vm.gridOptions.onRegisterApi = function (gridApi) {
                vm.gridApi = gridApi;
            }

            vm.getTableHeight = function() {
                var filter_height = 0;
                if(vm.gridOptions.enableFiltering) { 
                    filter_height = 30;
                }
                var rowHeight = 40;
                var headerHeight = 50;
                return {
                   height: (vm.numOptions * rowHeight + headerHeight + filter_height) + "px"
                };
            };

            vm.submitContactForm = function (contact_form) {
                vm.contact_form_success = '';
                vm.contact_form_error = '';
                vm.form_errors = {};

                $http({url: '/contact/submit', method: 'post', cache: false, data: contact_form})
                    .success(function (res) {
                        console.log(res);
                        if(res.success) {
                            vm.contact_form_success = 'Contact form sent!';
                            vm.contact_form_error = '';
                            
                            vm.contact_form.name = '';
                            vm.contact_form.email = '';
                            vm.contact_form.message = '';
                        }
                    })
                    .error(function (res) { 
                        console.log(res);
                        vm.contact_form_success = '';
                        vm.contact_form_error = 'Could not save contact form. Please review the errors below and try again.';
                        vm.form_errors = res.form_errors;
                    });
            }

            vm.loadContactFormItems = function () {
                var account_item_url = '/admin/getContactFormItems';
                console.log(account_item_url);
                $http({url: account_item_url, method: 'get', cache: false})
                    .success(function (res) {
                        console.log(res);
                        vm.gridOptions.data = res['contact_form_items'];
                    })
                    .error(function () {
                        console.log('error');
                    });
            }
        }

})();