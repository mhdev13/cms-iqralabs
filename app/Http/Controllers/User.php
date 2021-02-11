<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\Users;
use App\Groups;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    public function index(){
    	
    	$users = Users::get(); 

    	return view('user',['user' => $users]);
    }

    public function add(){
    	return view('add');
    }

    public function store(Request $request)
    {
        // dd($request);exit;
        // $image_name = $request->image;
        // $image = $request->file('image');

        // if($image != '')
        // {
        //     $request->validate([
        //         'user_name' => 'required',
        //         'image' => 'image|max:2084'
        //     ]);

        //     $image_name = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $image_name);
        // } else {
        //     $request->validate([
        //         'user_name' => 'required',
        //     ]);
        // }

        $input['no_identity'] = Input::get('no_identity');

        $rules = array('no_identity' => 'unique:users,no_identity');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('failed',' failed add data, number identity already use');
            return redirect('/user/add/'.$request->id.'');
        } else {
            DB::table('users')->insert([
                'no_identity' => $request->no_identity,
                'fullname' => $request->fullname,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'birthdate' => $request->birthdate,
                'email' => $request->email,
                'fullname' => $request->fullname,
                'education' => $request->education,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
            ]);
        }

        Session::flash('flash_message','successfully saved.');

        return redirect('/user');
    }

    public function detail($id)
    {
        //mengambil data user berdasarkan id yang dipilih
        $users = DB::table('users')
            ->select('users.*','groups.*')
            ->leftJoin('groups', 'users.id', '=', 'groups.id')
            ->where('users.id',$id)
            ->get();
        
        // passing data detail yang didapat ke view edit.blade.php		
		return view('detail',['users' => $users]);
    }

    public function edit($id)
    {
        //mengambil data user berdasarkan id yang dipilih
        $users = DB::table('users')
            ->select('*')
            ->where('id',$id)
            ->get();
        
        // passing data edit user yang didapat ke view edit.blade.php
        return view('edit',['users' => $users]);
    }

    public function update(Request $request)
    {   
        // $image_name = $request->image;
        // $image = $request->file('image');

        // if($image != '')
        // {
        //     $request->validate([
        //         'user_name' => 'required',
        //         'image' => 'image|max:2084'
        //     ]);

        //     $image_name = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $image_name);
        // } else {
        //     $request->validate([
        //         'user_name' => 'required',
        //     ]);
        // }

        $input['no_identity'] = Input::get('no_identity');
        $rules = array('no_identity' =>'unique:users,no_identity,'.$request->no_identity.'');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('failed',' failed edit data, no_identity already exist');
            return redirect('/user/edit/'.$request->id.'');
        } else {
                 DB::table('users')
                ->where('users.id',$request->id)
                ->update([
                'no_identity' => $request->no_identity,
                'fullname' => $request->fullname,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'birthdate' => $request->birthdate,
                'email' => $request->email,
                'education' => $request->education,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'status' => $request->status
            ]);
        }
        
        Session::flash('flash_message','successfully saved.');

        return redirect('/user');
    }
}
