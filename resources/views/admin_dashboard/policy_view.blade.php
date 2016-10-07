@extends('admin_dashboard.admin')

@section('right-column')
    <div ng-controller="PolicyView">
      <h2>Policy No: {{ $policy->policy_no }}</h2>

      <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover paginated-list">
      <thead>
        <tr>
          <th width=40%>Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Scheme 1: </strong></td>
          <td>{{ $policy->scheme_1 ? $policy->scheme_1 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Scheme 2: </strong></td>
          <td>{{ $policy->scheme_2 ? $policy->scheme_2 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Job ID: </strong></td>
          <td>{{ $policy->job_id ? $policy->job_id : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Account Item ID: </strong></td>
          <td>{{ $policy->account_item_id ? $policy->account_item_id : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Prefix: </strong></td>
          <td>{{ $policy->prefix ? $policy->prefix : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Site Address 1: </strong></td>
          <td>{{ $policy->site_address_1 ? $policy->site_address_1 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Site Address 2: </strong></td>
          <td>{{ $policy->site_address_2 ? $policy->site_address_2 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Site Address 3: </strong></td>
          <td>{{ $policy->site_address_3 ? $policy->site_address_3 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Site Address 4: </strong></td>
          <td>{{ $policy->site_address_4 ? $policy->site_address_4 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Contractor: </strong></td>
          <td>{{ $policy->contractor ? $policy->contractor : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Work Type 1: </strong></td>
          <td>{{ $policy->work_type_1 ? $policy->work_type_1 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Work Type 2: </strong></td>
          <td>{{ $policy->work_type_2 ? $policy->work_type_2 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Work Type 3: </strong></td>
          <td>{{ $policy->work_type_3 ? $policy->work_type_3 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Contract Price: </strong></td>
          <td>{{ $policy->contract_price ? $policy->contract_price : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Excess: </strong></td>
          <td>{{ $policy->excess ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Excess value: </strong></td>
          <td>{{ $policy->excess_value ? $policy->excess_value : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Code 1: </strong></td>
          <td>{{ $policy->code_1 ? $policy->code_1 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Code 2: </strong></td>
          <td>{{ $policy->code_2 ? $policy->code_2 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Completion Date: </strong></td>
          <td>{{ $policy->completion_date ? $policy->completion_date : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Original Policy Start Date: </strong></td>
          <td>{{ $policy->orig_pol_start_date ? $policy->orig_pol_start_date : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Deposit Paid Date: </strong></td>
          <td>{{ $policy->deposit_paid_date ? $policy->deposit_paid_date : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Guarantee Term 1: </strong></td>
          <td>{{ $policy->guarantee_term_1 ? $policy->guarantee_term_1 : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Commision: </strong></td>
          <td>{{ $policy->commision ? $policy->commision : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Payment Made: </strong></td>
          <td>{{ $policy->payment_made ? $policy->payment_made : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>IPT Tax: </strong></td>
          <td>{{ $policy->ipt_tax ? $policy->ipt_tax : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>IPT Plus Payment: </strong></td>
          <td>{{ $policy->ipt_plus_payment ? $policy->ipt_plus_payment : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Net Premium: </strong></td>
          <td>{{ $policy->net_premium ? $policy->net_premium : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Month of Completion: </strong></td>
          <td>{{ $policy->month_of_completion ? $policy->month_of_completion : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Location: </strong></td>
          <td>{{ $policy->location ? $policy->location : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Type: </strong></td>
          <td>{{ $policy->type ? $policy->type : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>No of Policies: </strong></td>
          <td>{{ $policy->no_of_policies ? $policy->no_of_policies : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Bordereau Month: </strong></td>
          <td>{{ $policy->bord_month ? $policy->bord_month : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Reserve Pot: </strong></td>
          <td>{{ $policy->reserve_pot ? $policy->reserve_pot : '&nbsp;' }}</td>
        </tr> 
        <tr>
          <td><strong>Actuarial Split: </strong></td>
          <td>{{ $policy->actual_split ? $policy->actual_split : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Month of Account: </strong></td>
          <td>{{ $policy->month_of_account ? $policy->month_of_account : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Bord Name: </strong></td>
          <td>{{ $policy->bord_name ? $policy->bord_name : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Customer Name: </strong></td>
          <td>{{ $policy->customer_surname ? $policy->customer_surname : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Unique Identifier: </strong></td>
          <td>{{ $policy->unique_identifier ? $policy->unique_identifier : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Actuarial Adjustment: </strong></td>
          <td>{{ $policy->actuarial_adjustment ? $policy->actuarial_adjustment : '&nbsp;' }}</td>
        </tr>
        <tr>
          <td><strong>Claims Paid: </strong></td>
          <td>{{ $policy->claims_paid ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
          <td><strong>Claim Amount: </strong></td>
          <td>{{ $policy->claim_amount ? $policy->claim_amount : '&nbsp;' }}</td>
        </tr>
      </tbody>
      </table>

      <div class="form-group">
        <button class="btn btn-lg btn-normal" ng-click="goBack()">Back</button> &nbsp; 
        <button class="btn btn-lg btn-info pull-right" 
          ng-click="save(saveReason)" 
          ng-disabled="!reason.name || !reason.state">Save</button>
      </div>
    </div>
@stop