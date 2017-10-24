<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\Http\Requests\SessionRequest;

class SessionsController extends Controller
{
    public function login(){
        if ($user = Sentinel::check()) {
            Session::flash('notice','You has login',$user->first_name);
            return redirect('/');
        } else {
            return view('sessions.login');
        }
        
    }

    public function login_store(SessionRequest $request){
        if ($user = Sentinel::authenticate($request->all())) {
            Session::flash('notice','Welcome '.$user->first_name);
                if ($user->first_name == 'admin') {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('users.index');
                }
                
            return redirect();
        } else {
            Session::flash('error','Login Fails');
            return view('sessions.login');
        }
        
    }

    public function logout() {
        Sentinel::logout();
        Session::flash("notice", "Logout success");
        return redirect('/');
    }
}
