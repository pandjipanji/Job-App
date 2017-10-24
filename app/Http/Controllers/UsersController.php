<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\UserDetail;
use Session;
use Sentinel;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfileRequest;
class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('sentinel');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Sentinel::getUser()->id;
        //dd($user);
        $user_detail = UserDetail::where('user_id',$user)->first();
        //dd($user_detail->id);
        return view('users.dashboard')->with('detail',$user_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $user_data = User::with(array('userdetail' => function($query) use ($id)
        {
            $query->where('user_details.user_id',$id);
        }))->get();
        //dd($user_data);
        return view('users.profile')->With('userdata',$user_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $user = User::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name            
        ]);
        //dd($user);
        $userdetail = UserDetail::where('user_id',$id)->update([
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'phone' => $request->phone
        ]);

        if ($user && $userdetail) {
            Session::flash('notice','Updated Successfuly');
            return redirect()->route('users.index');
        } else {
            Session::flash('error','Fail to update');
            return redirect()->route('users.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function app_submission(ApplicationRequest $request){
        try{
            $destination_path = "uploads/";
            $file = $request->app_file;
            $name = "CV_".$request->user_name."_".$request->user_id."_".$request->app_file->getClientOriginalName();
            $request->app_file->move($destination_path,$name);
            UserDetail::where('user_id',$request->user_id)
                      ->update([
                          'file' => $destination_path.$name,
                          'status' => 'unread'
                      ]);
            Session::flash('notice','Application Submitted');
            return redirect()->route('users.index');
        } catch(\Exception $e) {
            Session::flash('error','Fail to submit');
            return redirect()->route('users.index');
        }
    }
}
