@extends('admin_dashboard.admin')

@section('right-column')
<div>
    <div class="margin-bottom-20">
        <div ng-controller="ContactForm as vm">
            <div ng-if="vm.update_error" class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                <span class="sr-only">Error:</span>
                <% vm.update_error %>
            </div>
            <div ng-if="vm.update_success" class="alert alert-success" role="alert">
                <i class="fa fa-check" aria-hidden="true"></i>
                <span class="sr-only">Success:</span>
                <% vm.update_success %>
            </div>
            <div ng-init="vm.loadContactFormItems()">
                <div id="grid1" ui-grid="vm.gridOptions" ui-grid-pagination ui-grid-auto-resize class="grid" ng-style="vm.getTableHeight()"></div>
                <div class="text-center">
                    <p>Current page: <% vm.gridApi.pagination.getPage() %> of <% vm.gridApi.pagination.getTotalPages() %></p>
                    <ul class="pagination">
                        <li><a ng-click="vm.gridApi.pagination.previousPage()">&laquo;</a></li>
                        <li ng-repeat="n in vm.range(1,vm.gridApi.pagination.getTotalPages())" ng-class="{active: n==vm.gridApi.pagination.getPage()}">
                            <a ng-click="vm.gridApi.pagination.seek(n)"><% n %></a>
                        </li>
                        <li><a ng-click="vm.gridApi.pagination.nextPage()">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop