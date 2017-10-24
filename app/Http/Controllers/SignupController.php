<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\UserDetail;
use App\Http\Requests\UserRequest;

class SignupController extends Controller
{
    public function signup()
    {
        return view('sessions.signup');
    }

    public function signup_store(UserRequest $request)
    {
            //// below code will register and automatic activate account user
        //Sentinel::register($request, true);
        //// or
        $fill = [
            'email' => $request->email,
            'password' => $request->password,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ];
        
        $default_user = Sentinel::registerAndActivate($fill);
        
        UserDetail::create([
            'user_id' => $default_user->id,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'phone' => $request->phone
        ]);
        //$default_role = Sentinel::findRoleByName('Writer');   

        //$default_user->roles()->attach($default_role);    
        Session::flash('notice', 'Successfuly Registered, Please login');
        return redirect('/');
    }
}
