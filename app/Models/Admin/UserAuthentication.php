<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserAuthentication extends Model
{
    //
    public function saveUserRegistration($save_data) {

    	return DB::table('users')->insertGetId($save_data);

    }

    public function getLoginDetails($email) {

    	return DB::table('users')
    			->select('id','name','email','password')
    			->where([
    					['email',$email],
    					['status',1]
    			])
    			->first();

    }

}
