<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserAuthentication;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Session;

class UserAuthenticationController extends Controller
{
    //
	public function __construct() {
		$this->user = new UserAuthentication();
	}

	public function userRegisteration(Request $request) {

		$validator = Validator::make($request->all(),
            [
            	'name'	 	 => 'required',
                'email'  	 => 'required|email|max:255',
                'password' 	 	 => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6'
            ]
        );

        if($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
        }

        $save_data = array();

        $save_data['name']     = $request->name; 
        $save_data['email']    = $request->email;
        $save_data['password'] = password_hash($request->password, PASSWORD_BCRYPT);

        $user_id = $this->user->saveUserRegistration($save_data);

        if($user_id > 0) {
			return redirect()->back()->with(['success' => 'User registration successfull.']);
        } else {
			return redirect()->back()->withErrors(array('wrong' => 'Something went wrong. Please refresh and try again.'))->withInput();
        }
		
	}

	public function checkLogin(Request $request) {

		$validator = Validator::make($request->all(),
            [
                'uemail' => 'required|email|max:255',
                'psw' => 'required|min:6'
            ]
        );

        if($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
        }

		$getres = $this->user->getLoginDetails($request->uemail);

		if($getres != null) {

			if (password_verify($request->psw, $getres->password)) {
				Session::put('user_id', Crypt::encryptString($getres->id));
				Session::put('name', $getres->name);
                Session::put('email', $getres->email);
				return redirect('/home');
			} else {
				return redirect()->back()->withErrors(array('wrong' => 'Invalid credentials.'))->withInput();
			}

		} else {
			return redirect()->back()->withErrors(array('wrong' => 'No user details found.'))->withInput();
		}

	}

	public function userLogout() {

			Session::forget('user_id');
			Session::forget('name');
			Session::forget('email');

			return redirect('/');

	}

}
