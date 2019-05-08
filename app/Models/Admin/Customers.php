<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Customers extends Model
{
    //
    public function getAllDetails() {

    	return DB::table('customer_master')->select('*')->get();

    }

    public function saveCustomerData($save_data) {

    	return DB::table('customer_master')->insertGetId($save_data);

    }

    public function changeExistingCustomer($customerId, $operation){

        if($customerId!='' && $operation!='') {

            if($operation=='delete') {

                $customerDetails = DB::table('customer_master')->where('customer_id', $customerId)->delete();

                if ($customerDetails) {
                    $res = array('success' => true,'response'=>['msg'=>'success'] ,'data'=>$customerId);
                    return json_encode($res);
                } else {
                    $res = array('success' => false,'response'=>['msg'=>'Error in query.']);
                    return json_encode($res);
                }

            }

            if($operation=='edit') {

                $customerDetailsget = DB::table('customer_master')
                                    ->select('name','email','mobile')
                                    ->where('customer_id', $customerId)
                                    ->first();

                if ($customerDetailsget) {

                    $values = array(
                        'name'=>$customerDetailsget->name,
                        'email' => $customerDetailsget->email,
                        'mobile'=> $customerDetailsget->mobile,
                        'id'=> Crypt::encryptString($customerId)
                    );

                    $res = array('success' => true,'response'=>['msg'=>'success'] ,'data'=>$values);
                    return json_encode($res);
                } else {
                    $res = array('success' => false,'response'=>['msg'=>'Error in query.']);
                    return json_encode($res);
                }

            }

        }
        else {
            return 'Error in query';
        }

    }

    public function editExistingCustomer($updatedata,$customerId) {

        $update = DB::table('customer_master')
        			->where('customer_id',$customerId)
        			->update($updatedata);

        if($update) {
            return $customerId;
        }
        else {
            return "failed to update";
        }

    }

}
