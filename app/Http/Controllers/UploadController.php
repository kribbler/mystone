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

class UploadController extends Controller {

    private $valid_mime_types = ['application/pdf'];

    public function index()
    {

        return view('admin_dashboard.upload_view');

    }

    public function uploadFiles() {
        if (Auth::check()) {
            try {
                $response = [];

                $import_data = new Import;
                $import_data->user_id = Auth::id();
                $import_data->file_name = $this->uploadDocument();

                if($import_data->save()) {
                    $this->processUploadedCsv($import_data->id);
                }

                $statusCode = 200;
                $response['success'] = true;
            } catch (Exception $e) {
                $statusCode = 400;
                $response['success'] = false;
                $response['error'] = 'Unable to save import information: ' . $e->getMessage();
                if(isset($validator)) {
                    $response['form_errors'] = $validator->messages();
                }
            } finally {
                //return response()->json($response, $statusCode);
                return redirect()->action('PoliciesController@index');
            }
        }
 
        $input = Input::all();
        
        $rules = array(
            'file' => 'csv',
        );
    
        $validation = Validator::make($input, $rules);
 
        if ($validation->fails()) {
            return Redirect::to('/')->with('message', $validation->errors->first());
        }
        
        $file = array_get($input,'file');
        $destinationPath = 'uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(11111, 99999) . '.' . $extension;
        $upload_success = $file->move($destinationPath, $fileName);
    
        if ($upload_success) {
            return Redirect::to('admin/upload')->with('message', 'File uploaded successfully');
        }
    }

    private function processUploadedCsv($import_id)
    {

        $import = Import::find($import_id);
        //$import->file_name
        $filename = base_path() . '/public/uploads/' . $import->file_name;
        if(!file_exists($filename) || !is_readable($filename)) {
            return FALSE;
        }
        
        $header = NULL;
        $records = array();
        $k = 1;
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000)) !== FALSE)
            {
                if(!$header && $k == 2) {
                    $header = $row;
                } else if ($k > 2) {
                    $records[] = array_combine($header, $row); 
                }
                $k++;
            }
            fclose($handle);
        }

        if ($records) {
            $this->saveRecords($records, $import_id);
        }
    }

    private function saveRecords($records, $import_id)
    {

        //dump($records); //die();
        foreach ($records as $record) {
            if (!$this->alreadyImported($record['Policy_No'])) {
                $policy = new Policy;
                $policy->import_id = $import_id;
                $policy->scheme_1 = $record['Scheme 1'];
                $policy->scheme_2 = $record['Scheme 2'];
                $policy->job_id = $record['JOB_ID'];
                $policy->account_item_id = $record['ACCOUNT_ITEM_ID(Cont No.)'];
                $policy->policy_no = $record['Policy_No'];
                $policy->prefix = $record['Prefix'];
                $policy->site_address_1 = $record['SITE_ADDRESS_1'];
                $policy->site_address_2 = $record['SITE_ADDRESS_2'];
                $policy->site_address_3 = $record['SITE_ADDRESS_3'];
                $policy->site_address_4 = $record['SITE_ADDRESS_4(Post Code)'];
                $policy->contractor = $record['CONTRACTOR'];
                $policy->work_type_1 = $record['WORK_TYPE_1'];
                $policy->work_type_2 = $record['WORK_TYPE_2'];
                $policy->work_type_3 = $record['WORK_TYPE_3'];
                $policy->contract_price = $record['CONTRACT_PRICE'];
                $policy->excess = $record['Excess'];
                $policy->excess_value = $record['Excess value'];
                $policy->code_1 = $record['CODE1(rates)'];
                $policy->code_2 = $record['CODE2(rates)'];
                $policy->completion_date = $this->convertDateToSQLFormat($record['COMPLETION_DATE']);
                $policy->orig_pol_start_date = $this->convertDateToSQLFormat($record['Orig Pol Start Date']);
                $policy->deposit_paid_date = $this->convertDateToSQLFormat($record['DEPOSIT_PAID_DATE']);
                $policy->guarantee_term_1 = $record['GUARANTEE_TERM_1'];
                $policy->commision = $record['Commision'];
                $policy->payment_made = $record['PAYMENT_MADE'];
                $policy->ipt_tax = $record['IPT/TAX'];
                $policy->ipt_plus_payment = $record['IPTPLUSPAYMENT'];
                $policy->net_premium = $record['NET_PREMIUM'];
                $policy->month_of_completion = $this->convertDateToSQLFormat($record['MONTH_OF_COMPLETION']);
                $policy->location = $record['LOCATION'];
                $policy->type = $record['Type'];
                $policy->no_of_policies = $record['No of Policies'];
                $policy->bord_month = $this->convertDateToSQLFormat($record['Bord Month']);
                $policy->reserve_pot = $record['Reserve Pot'];
                $policy->actual_split = $record['Actuarial Split'];
                $policy->month_of_account = $this->convertDateToSQLFormat($record['Month of Account']);
                $policy->bord_name = $record['Bord Name'];
                $policy->customer_surname = $record['Customer Surname'];
                $policy->unique_identifier = $record['Unique identifier'];
                $policy->actuarial_adjustment = $record['Actuarial Adjustment'];
                $policy->claims_paid = $record['Claims Paid(Y or N)'];
                $policy->claim_amount = $record['Claim Amount'];
                
                $policy->save();
            }
            
        }

    }

    private function alreadyImported($policy_no)
    {
        
        $policy = DB::table('policies')
            ->where('policy_no', $policy_no)
            ->get();

        return ($policy) ? true : false;  

    }

    private function convertDateToSQLFormat($alphaDate)
    {

        //Get registration date, convert from old format and defaults to current date
        if(isset($alphaDate) && $alphaDate != '') {
            $date = str_replace('/', '-', $alphaDate);
            $alphaDate = date('Y-m-d', strtotime($date));
        } else {
            $alphaDate = date('Y-m-d');
        }
        return $alphaDate;
        
    }

    private function uploadDocument()
    {

        $input = Input::all();
        /*$rules = array(
            'file' => 'csv',
        );
    
        $validation = Validator::make($input, $rules);
 
        if ($validation->fails()) {
            return Redirect::to('/')->with('message', $validation->errors->first());
        }*/
        
        $file = array_get($input,'file');
        $destinationPath = 'uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = date_timestamp_get(date_create()) . '.' . $extension;
        $upload_success = $file->move($destinationPath, $fileName);
    
        if ($upload_success) {
            return $fileName;
        }
    }

    public function file(Request $r)
    {
        
        $errors = [];
        try {    
            
            $file = Input::file('file');
            if (!in_array($file->getMimeType(), $this->valid_mime_types)) {
                $errors[] = ['Not a valid file type.'];
                throw new Exception('Not a valid file type.');
            }
            $uuid = Uuid::uuid4()->toString();
            
            $destination_path = storage_path() . '/uploaded_policies/';
            // $file_name = 'app_' . $uuid . '.' . $file->guessExtension();
            $file_name = $uuid;
            
            $local_file_path = $destination_path . $file_name;

            if(!$file->move($destination_path, $file_name)) {
                $errors[] = ['Error saving the file.'];
                throw new Exception('Error saving the file.');
            }

            $uploaded = FileUpload::upload($file_name, $local_file_path);
            if(!$uploaded) {
                $errors[] = ['Error saving the file.'];
                throw new Exception('Error saving the file.');
            }

            if(!empty($errors)) {
                throw new Exception('Oops! Something went wrong.');
            }

            $res = [
                'success' => true,
                'file_name' => $file_name,
            ];

            return response()->json($res, 200);

        } catch (Exception $e) {
            return response()->json(['errors' => $errors], 400);
        }
    }

    public function view($file_id)
    {
        $errors = [];
        $input_values = [
            'file_id' => $file_id,
        ];

        try {    
            $validator = Validator::make($input_values, [
                'file_id' => 'required|string|max:50',
            ]);

            if ($validator->fails()) {
                throw new Exception('Validation failed.');
            }

            $file = FileUpload::render($file_id);
            return response($file->get('Body'))->header('Content-Type', $file->get('ContentType'));

        } catch (Exception $e) {
            return response()->json(['errors' => $errors], 400);
        }
    }

}