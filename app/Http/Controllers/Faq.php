<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\Users;
use App\Groups;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Faq extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = DB::table('cms_faq')
        ->select('*')
        ->orderBy('id','ASC')
        ->get();

        return view('faq/faq',['faq' => $faq]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq/add_faq');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->_token != ''){
            DB::table('cms_faq')->insert([
                'question' => $request->question,
                'answer' => $request->answer,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('flash_message', 'succesfully saved.');

            return redirect('/faq');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = DB::table('cms_faq')
            ->Select('*')
            ->where('id', $id)
            ->get();

        return view('faq/edit_faq', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->_token != ''){
            DB::table('cms_faq')
                ->where('id', $request->id)
                ->update([
                    'question' => $request->question,
                    'answer' => $request->answer,
                    'updated_at' => carbon::now()
                ]);

            Session::flash('flash_message','successfully update.');

            return redirect('/faq');
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
        DB::table('cms_faq')->where('id', $id)->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/faq');
    }
}
