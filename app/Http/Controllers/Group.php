<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\Groups;

class Group extends Controller
{
    public function index(){
    	
		$group = DB::table('groups')->get();
	    
		return view('group',['group' => $group]);
    }

    public function add(){
    	return view('add_group');
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
		$group = DB::table('groups')->where('id',$id)->get();
		
		return view('detail_group',['groups' => $group]);
    }

    public function edit($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        $group = DB::table('groups')->where('id',$id)->get();
        // passing data user yang didapat ke view edit.blade.php
        return view('edit_group',['groups' => $group]);
    }

    public function update(Request $request)
    {
        DB::table('groups')->where('id',$request->id)->update([
            'group_name' => $request->group_name,
            'remark' => $request->remark,
        ]);

        return redirect('/group');
    }
}
