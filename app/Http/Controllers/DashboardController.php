<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Multisite;
use App\Models\Contact;

use Validator;
use Exception;
use DB;

class DashboardController extends Controller {

  public function index()
  {
      $res = [
        'v1' => 'exx',
      ];

      return view('admin_dashboard.dashboard', $res);
  }

}