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

class Price extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = DB::table('mau_price')
        ->select('*')
        ->get();

        return view('price/price',['price' => $price]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price/add_price');
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
            DB::table('mau_price')->insert([
                'package_name' => $request->package_name,
                'price' => $request->price,
                'class_type' => $request->class_type,
                'max_student' => $request->max_student,
                'learning_duration' => $request->learning_duration,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('flash_message', 'succesfully saved.');

            return redirect('/price');
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
        $price = DB::table('mau_price')
        ->Select('*')
        ->where('id', $id)
        ->get();

        return view('price/edit_price', ['price' => $price]);
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
    public function update(Request $request, $id)
    {
        if($request->_token != ''){
            DB::table('mau_price')
                ->where('id', $request->id)
                ->update([
                    'package_name' => $request->question,
                    'price' => $request->answer,
                    'class_type' => $request->answer,
                    'max_student' => $request->answer,
                    'learning_duration' => $request->answer,
                    'description' => $request->answer,
                    'updated_at' => carbon::now()
                ]);

            Session::flash('flash_message','successfully update.');

            return redirect('/price');
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
        DB::table('mau_price')->where('id', $id)->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/price');
    }

    public function getPrice()
    {
        $data = array(
            "status" => 200,
            "response" => "success",
            "data" => DB::table('mau_price')
            ->select("*")
            ->get()
        );

        return $data;
    }
}
