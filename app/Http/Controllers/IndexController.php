<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Multisite;

class IndexController extends Controller
{

    /*
    * Main entry point into the application
    */

    public function index()
    {
        return view('index', []);
    }

}
