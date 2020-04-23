<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\Products;

class User extends Controller
{
    public function index(){
    	
    	$User = DB::table('users')->get();
        
    	return view('home',['user' => $User]);
    }

    public function add(){
    	return view('add');
    }

    public function store(Request $request)
    {
        // var_dump($request);exit;
        $this->validate($request, [
    		'user_name' => 'required',
    		'fileimage' => 'required|file|image|mimes:jpeg,png,jpg,svg|max:2048',
		]);

		$file = $request->file('fileimage');
		$extension = $file->getClientOriginalExtension();
		$filename = time().".". $extension;
		$upload_directory = 'upload';
		$file->move($upload_directory,$filename);

		Products::create([
			'ic' => $request->ic,
    		'user_name' => $request->user_name,
    		'gender' => $request->gender,
            'price' => $request->price,
            'join_date' => $request->join_date,
            'group' => $request->group,
            'remark' => $request->remark,
    		'image' => $filename
		]);

    	return redirect('/user');
    }

    public function detail($id)
    {

		$users = DB::table('users')->where('id',$id)->get();
		
		return view('detail',['users' => $users]);
    }

    public function edit($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        $users = DB::table('users')->where('id',$id)->get();
        // passing data user yang didapat ke view edit.blade.php
        return view('edit',['users' => $users]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'fileimage' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('fileimage');
        $extension = $file->getClientOriginalExtension();
        $filename = time().".". $extension;
        $upload_directory = 'upload';
        $file->move($upload_directory,$filename);
        Products::create([
            'ic' => $request->ic,
            'user_name' => $request->user_name,
            'gender' => $request->gender,
            'price' => $request->price,
            'join_date' => $request->join_date,
            'group' => $request->group,
            'remark' => $request->remark,
            'image' => $filename
        ]);

        return redirect('/user');
    }
}
