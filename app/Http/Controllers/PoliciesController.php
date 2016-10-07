<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Validator;
use Ramsey\Uuid\Uuid;
use App\Helpers\FileUpload;
use Exception;
use Auth;
use Response;
use Redirect;
use App\Models\Import;
use App\Models\Policy;
use DB;

class PoliciesController extends Controller {
  
  public function index()
  {

    return view('admin_dashboard.policies', []);

  }

  public function getPolicies(Request $request)
  {
      $policies = DB::table('policies')
            ->paginate(15); 
      return response($policies);
  }

  public function view(Policy $policy)
  {

    $res = [
        'policy' => $policy,
    ];
    return view('admin_dashboard.policy_view', $res);

  }

  public function json(Request $request){ 
    if (isset($request->per_page) && $request->per_page) {
      $limit = $request->per_page;
    } else {
      $limit = 25;
    }
    $policies = DB::table('policies')
      ->where(function($query) use ($request) {
        if (isset($request->policy_no) && $request->policy_no) {
          $query->where('policy_no', 'LIKE', '%' . $request->policy_no . '%');
        }
      })
      ->where(function($query) use ($request) {
        if (isset($request->contractor) && $request->contractor) {
          $query->where('contractor', 'LIKE', '%' . $request->contractor . '%');
        }
      })
      ->where(function($query) use ($request) {
        if (isset($request->prefix) && $request->prefix) {
          $query->where('prefix', '=', $request->prefix);
        }
      })
      ->paginate($limit); 
    return Response::json($policies);
  }

  public function generatePoliciesCsv(Request $request)
  {

    $policies = DB::table('policies')
      ->where(function($query) use ($request) {
        if (isset($request->policy_no) && $request->policy_no) {
          $query->where('policy_no', 'LIKE', '%' . $request->policy_no . '%');
        }
      })
      ->where(function($query) use ($request) {
        if (isset($request->contractor) && $request->contractor) {
          $query->where('contractor', 'LIKE', '%' . $request->contractor . '%');
        }
      })
      ->where(function($query) use ($request) {
        if (isset($request->prefix) && $request->prefix) {
          $query->where('prefix', '=', $request->prefix);
        }
      })
      ->get();

    $generated_file_name = 'xxx.csv';
    $file_path = base_path() . '/public/uploads/' . $generated_file_name;
    $csv = fopen($file_path, 'w');
    
    $header = DB::getSchemaBuilder()->getColumnListing('policies');
    fputcsv($csv, $header);
  
    foreach ($policies as $policy) {
      $policy = (array) $policy;
      $policy = array_values($policy);
      fputcsv($csv, $policy);
    }

    fclose($csv);

    return Response::json($generated_file_name);

  }

}
