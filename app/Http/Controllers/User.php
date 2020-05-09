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
        $this->validate($request, [
    		'user_name' => 'required',
    		'fileimage' => 'required|file|image|mimes:jpeg,png,jpg,svg|max:2048',
		]);

		$file = $request->file('fileimage');
		$extension = $file->getClientOriginalExtension();
		$filename = time().".". $extension;
		$upload_directory = 'upload';
		$file->move($upload_directory,$filename);

		Users::create([
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
        //mengambil data user berdasarkan id yang dipilih
        $users = DB::table('users')
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
            ->leftJoin('groups', 'users.id', '=', 'groups.id')
            ->where('users.id',$id)
            ->get();

        // passing data edit user yang didapat ke view edit.blade.php
        return view('edit',['users' => $users]);
    }

    public function update(Request $request)
    {   
        $image_name = $request->image;
        $image = $request->file('image');

        if($image != '')
        {
            $request->validate([
                'user_name' => 'required',
                'image' => 'image|max:2084'
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([
                'user_name' => 'required',
            ]);
        }

        $input['ic'] = Input::get('ic');

        $rules = array('ic' => 'unique:users,ic');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            Session::flash('failed',' failed update data, ic already use');
            return redirect('/user/edit/'.$request->id.'');
        } else {
            DB::table('users')
                ->leftJoin('groups', 'users.id', '=', 'groups.id')
                ->where('users.id',$request->id)
                ->update([
                'ic' => $request->ic,
                'user_name' => $request->user_name,
                'gender' => $request->gender,
                'join_date' => $request->join_date,
                'group' => $request->group,
                'image' => $image_name,
                'remark' => $request->remark
            ]);
        }

        return redirect('/user');
    }
}
