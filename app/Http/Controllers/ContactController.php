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

class ContactController extends Controller
{

    public function index()
    {
        return view('contact', []);
    }

    public function submit(Request $request)
    {
        try {
            $response = [];

            $input_values = [
                'name'    => $request->input('name'),
                'email'   => $request->input('email'),
                'message' => $request->input('message'),
                'env'     => Multisite::getEnv(),
            ];

            $validator = Validator::make($input_values, [
                'name'    => 'required|string|min:2|max:255',
                'email'   => 'required|email|max:255',
                'message' => 'required|string|min:2|max:2048',
            ]);

            if ($validator->fails()) {
                throw new Exception('Validation failed.');
            }

            $contact = Contact::create($input_values);

            $statusCode = 200;
            $response['success'] = true;
        } catch (Exception $e) {
            $statusCode = 400;
            $response['success'] = false;
            $response['error'] = 'Unable to save contact form information: ' . $e->getMessage();
            if(isset($validator)) {
                $response['form_errors'] = $validator->messages();
            }
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function view(Contact $contact)
    {
        $res = [
            'contact' => $contact,
        ];
        return view('admin_dashboard.contact_view', $res);
    }

    public function admin()
    {
        return view('admin_dashboard.contacts', []);
    }

    public function getContactFormItems()
    {
        $statusCode = 400;
        $response = [];

        try {
            $contact_form_items = DB::table('contacts')
                ->select(
                    'contacts.id',
                    'contacts.name',
                    'contacts.email',
                    'contacts.message',
                    'contacts.transferred',
                    'contacts.env'
                )
                ->get();

            $response['contact_form_items'] = $contact_form_items;
            $response['success'] = true;
            $statusCode = 200;
        } catch (Exception $e) {
            $statusCode = 400;
            $response['contact_form_items'] = [];
            $response['success'] = false;
            $response['error'] = 'Unable to read API. Please contact IT.';
        } finally {
            return response()->json($response, $statusCode);
        }
    }

}
