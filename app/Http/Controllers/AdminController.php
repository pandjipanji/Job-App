<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Sentinel;
use App\User, App\UserDetail;
use App\Http\Requests\ProfileRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = User::with('userdetail')->get();
        $count = UserDetail::where('status','unread')->count('id');
        //dd($application);
        return view('admin.dashboard', compact('applications','count'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            return redirect()->route('admin.index');
        } else {
            Session::flash('error','Fail to update');
            return redirect()->route('admin.index');
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
        //dd($id);
        $userdetail = UserDetail::where('user_id',$id)->delete();
        $user = User::destroy($id);

        if ($userdetail && $user) {
            Session::flash('notice','Deleted successfuly');
            return redirect()->route('admin.index');
        } else {
            Session::flash('error','Fail to delete!!');
            return redirect()->route('admin.index');
        }
        
    }

    public function show_user($id){
        //dd($id);
        $user_data = User::with(array('userdetail' => function($query) use ($id)
        {
            $query->where('user_details.user_id',$id);
        }))->get();
        

        //dd($user_data);
        return view('admin.user_profile')->With('userdata',$user_data);
    }

    public function change_status(Request $request, $id){
        try{
            //dd($request->status);
            $update = UserDetail::find($id)->update([
                'status' => $request->status
            ]);
            Session::flash('notice','Changed Succesfuly');
            return redirect()->route('admin.index');
        } catch(\Exception $e) {
            Session::flash('error','Failed to Change');
            return redirect()->route('admin.index');
        }
        
    }

    public function download($file){
        $file_path = public_path('uploads/'.$file);
        return response()->download($file_path);
    }

    public function status_get(Request $request){
        //dd($request->status);
        $status = $request->status;
            $application = User::with(array('userdetail' => function($query) use ($status)
            {
                $query->where('user_details.status',$status);
                $query->orderBy('user_details.created_at','DESC');
            }))->get();
            //dd($application);
            return view('templates.table_ajax')->with('applications',$application);
    }
}
