<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Model\UserInfo;
use Crypt;
use DB;
use Validator;
use Auth;
use Session;
use Hash;


class ConsumerController extends Controller
{
    //Display DataTables of Consumer List in Admin Panel
    public function chartConsumer()
    {
    	$live = array('menu'=>'31','parent'=>'2');
    	$users = User::where('u_role','=','U')->get();
    	return view('admin.chartConsumer', compact('live','users'));
    }
    
    public function viewConsumer($name, $id)
    {
		$uID      = Crypt::decrypt($id);
		$live     = array('menu'=>'32','parent'=>'2');
		$user     = User::find($uID);
		$userInfo = UserInfo::where('u_id_fk','=',$uID)->first();
		$country  = DB::table('countries')->find($userInfo->country);
		$state    = DB::table('states')->find($userInfo->state);
		$city     = DB::table('cities')->find($userInfo->city);
    	return view('admin.viewUser', compact('live','country','user','userInfo','state','city'));
    }

    public function userRegister(Request $req)
    {
        $name     = $req->name;
        $email    = $req->email;
        $password = $req->password;
        $phone    = $req->phone;
        $dob      = $req->dob;
        $gender   = $req->gender;

        $rules = array(
            'name'    => 'required',
            'phone'    => 'required',
            'email'    => 'required',
            'password' => 'required',
            'dob'      => 'required',
            'gender'   => 'required',
        );
        $validator = Validator::make(array(
            'name'    => $name,
            'email'    => $email,
            'phone'    => $phone,
            'password' => $password,
            'dob'      => $dob,
            'gender'   => $gender,
            ), $rules);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else{
            if (User::where('email', '=', $email)->exists()) {
                Session::flash('message', 'Email already exists. Please try another email ID');
                return redirect()->back();
            } else{
                $user               = new User;
                $user->name         = $name;
                $user->email        = $email;
                $user->u_role       = 'U';
                $user->password     = Hash::make($password);
                $user->showPassword = $password;
                $user->save();

                $last_insert_id                 = $user->id;
                $userInfo                       = new UserInfo;
                $userInfo->u_id_fk              = $last_insert_id;
                $userInfo->email                = $email;
                $userInfo->name                 = $name;
                $userInfo->phone                = $phone;
                $userInfo->default_address_flag = 1;
                $userInfo->save();

                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    // echo "ok";
                    return redirect()->back();
                } else{
                    // echo "wrong";
                    return redirect()->back();
                }

            }

        }
    }
}
