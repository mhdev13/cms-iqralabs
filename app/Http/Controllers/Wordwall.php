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
use Storage;
use App\WordwallModel;

class Wordwall extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Wordwall = WordwallModel::all();

        return view('wordwall/wordwall',['Wordwall' => $Wordwall]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wordwall/add_wordwall');
    }


   public function store(Request $request)
   {

        $image = $request->file('image_thumbnail');

        if($request->_token != ''){
            $request->validate([
                'image_thumbnail' => 'mimes:jpeg,jpg,png,gif|required|max:500000',
            ]);

            $image_thumbnail = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_thumbnail);

           WordwallModel::create([
                'title'             => $request['title'],
                'category'          => $request['category'],
                'description'       => $request['description'],
                'Status'            => $request['status'],
                'image_thumbnail'   => $image_thumbnail,
                'Thumbnail'         => $request['thumbnail'],
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
           ]);

           Session::flash('flash_message', 'succesfully saved.');

           return redirect('/Wordwall');
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
       $wordwall = WordwallModel::find($id);
       return view('wordwall/edit_wordwall', ['wordwall' => $wordwall]);
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
            $id = $request['id'];

            $wordwall = WordwallModel::find($id);

            $wordwall['title']              = $request['title'];
            $wordwall['category']           = $request['category'];
            $wordwall['description']        = $request['description'];
            $wordwall['status']             = $request['status'];
            $wordwall['image_thumbnail']    = $request['image_thumbnail'];
            $wordwall['thumbnail']          = $request['thumbnail'];
            $wordwall['updated_at']         = carbon::now();
            $wordwall->save();

           Session::flash('flash_message','successfully update.');

           return redirect('/Wordwall');
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
       $wordwall = WordwallModel::find($id);

       $wordwall->delete();

       Session::flash('flash_message', 'successfully delete.');

       return redirect('/Wordwall');
   }
}
