<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Helpers\KinnellApi;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Application;

use App\Models\Payment;
use App\Models\AppApplication;
use App\Models\AppContractor;
use App\Models\AppDd;

use Validator;
use DB;
use Exception;
use Response;
use Log;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin_dashboard.index', []);
    }

}
