<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerContact extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\contact::all();

        if(count($data) > 0) {
            $res['message'] = "Succsess";
            $res['values'] = $data;
            return response($res);
        } 
        else {
            $res['message'] = "Empty!";
            return response($res);
        }
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
        $name         = $request->input('name');
        $email        = $request->input('email');
        $phonenumber  = $request->input('phonenumber');
        $address      = $request->input('address');

        $data              = new \App\contact();
        $data->name        = $name;
        $data->email       = $email;
        $data->phonenumber = $phonenumber;
        $data->address     = $address;

        if($data->save()){
            $res['message'] = "Succsess!";
            $res['value']   = "$data";
            return response($res);
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
        $data = \App\contact::where('id', $id)->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Succsess!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "Failed!";
            return response($res);
        }
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
        //
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
}
