<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Customers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller
{
    /*  parameterless contructor
    *   @object creation for Customers model
    */
    public function __construct() {

    	$this->customers = new Customers();

    }

    /*  function to get all customer data
    *   return to datatable to dsplay values
    */
    public function getAllCustomersData() {

    	$getres = $this->customers->getAllDetails();

        if(!empty($getres)){

            return Datatables::of($getres)
                ->addIndexColumn()
                ->rawColumns(['action','status'])
                ->addColumn('action', function ($getres) {
                	$valueData = '';
                    $valueData .= '<a class="btn btn-md edit-user" onclick="edit(' . "'" . Crypt::encryptString($getres->customer_id) . "'" . ')" data-toggle="tooltip" title="edit"><i class="glyphicon glyphicon-pencil"></i>Edit</a>';
                    $valueData .= '&nbsp;';
                    $valueData .= '<a class="btn btn-md delete-page" href="javascript:void(0)" onclick="delete_user(' . "'" . Crypt::encryptString($getres->customer_id) . "'" . ')" data-toggle="tooltip" title="delete"><i class="glyphicon glyphicon-trash"></i>Delete </a>';
                    return $valueData;
                })
                ->editColumn('status', function ($getres){
                    if($getres->status == 'active')
                        return '<span class="label label-success">Active</span>';
                    else
                        return '<span class="label label-danger">Deactive</span>';
                })
                ->make(true);

        }

    }

    /*  function to register new customer
    *   @request object required
    */
    public function newCustomer(Request $request) {

    	if(isset($request->name) && isset($request->email) && isset($request->mobile)) {

	    	$save_data = array();

	    	$save_data['name'] = $request->name;
	    	$save_data['email'] = $request->email;
	    	$save_data['mobile'] = $request->mobile;

	    	return $this->customers->saveCustomerData($save_data);

    	} else {
    		return "Mandatory data missing";
    	}

    }

    /*  function to delete or get particular customer details
    *   @id parameter for customer id
    *   @operation parameter to identify delete or get details operation
    */
    public function changeCustomer($id,$operation){

        if(!empty($id) && !empty($operation)) {

            $customerId = Crypt::decryptString($id);

            $res = $this->customers->changeExistingCustomer($customerId, $operation);
            $data = json_decode($res, true);

            if($data['success']==true) {
                return $data['data'];
            }
            else {
                return "Error";
            }

        }
        else {
            return "Mandatory data missing";
        }

    }

    /*  function to edit particular customer details
    *   @request object required
    */
    public function editCustomer(Request $request) {

        if(isset($request->name) && isset($request->mobile) && isset($request->email) 
        	&& isset($request->id)) {

            $updatedata = array();
            $updatedata['name'] = $request->name;
            $updatedata['mobile'] = $request->mobile;
            $updatedata['email'] = $request->email;
            $customerId = Crypt::decryptString($request->id);

            return $this->customers->editExistingCustomer($updatedata,$customerId);

        }
        else {
            return "Mandatory data missing";
        }

    }

}
