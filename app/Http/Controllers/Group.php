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
    		'group_name' => 'required',
		]);

		Groups::create([
    		'group_name' => $request->group_name,
    		'number_users' => $request->number_users,
            'remark' => $request->remark
		]);

    	return redirect('/group');
    }

    public function detail($id)
    {
		$group = DB::table('groups')
            ->leftJoin('users', 'groups.id', '=', 'users.id')
            ->where('groups.id',$id)
            ->get();
		
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
