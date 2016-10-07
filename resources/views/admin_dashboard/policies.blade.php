@extends('admin_dashboard.admin')

@section('right-column')
<div  ng-controller="Policies">
<div>
    <div class="row" ng-if="!hideFilters">
    <form ng-submit="applyFilter()">
        <div class="col-md-4">
            <div class="form-group">
                <label>Policy No</label>
                <input class="form-control" type="text" ng-model="filter.policy_no">
            </div>
            <div class="form-group">
                <label>Prefix</label>
                <input class="form-control" type="text" ng-model="filter.prefix">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Contractor</label>
                <input class="form-control" type="text" ng-model="filter.contractor">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Limit</label>
                <select class="form-control" ng-model="filter.per_page" ng-options="l as l for l in limits">
                    <option value="">25</option>
                </select>
            </div>
            <button class="btn btn-info" type="submit">Filter</button> <button class="btn btn-warning" type="button" ng-click="resetFilter()">Reset</button>
        </div>
        
	</form>
</div>
<hr ng-if="!hideFilters">

        <paginator-info></paginator-info><br />
        <pagination class="paginator-custom" total-items="total" ng-model="current_page" max-size="4" items-per-page="per_page" ng-change="pageChanged()" boundary-links="true"></pagination>

        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover paginated-list">
    <tr ng-if="data.length && !paginatorLoading">
        <th>Policy No</th>
        <th>Contractor</th>
        <th>Contract Price</th>
        <th></th>
    </tr>
    <tr ng-repeat="p in data" ng-if="!paginatorLoading">
        <td><% p.policy_no %></td>
        <td><% p.contractor %></td>
        <td><% p.contract_price | coreCurrency:'£' %></td>
        <td><div class="ui-btn-holder"><a href="/admin/policy/<% p.id %>" class="btn-u">View</a></div></td>
    </tr>
    <tr ng-if="!data.length && !paginatorLoading"><td>No items found.</td></tr>
    <tr ng-if="paginatorLoading"><td><img src="/img/loader-strip.gif" width="220" height="19" alt="Loading..."></td></tr>
</table>

<pagination class="paginator-custom" total-items="total" ng-model="current_page" max-size="4" items-per-page="per_page" ng-change="pageChanged()" boundary-links="true"></pagination>
<button type="button" class="btn btn-info pull-right" ng-if="got_filtered_data" ng-click="download_filtered_data()">Download as CSV</button>
    </div>
</div>
</div>
@stop