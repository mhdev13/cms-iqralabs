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
use App\TutorModel;

class Tutor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tutor = TutorModel::all();

        return view('tutor/tutor',['Tutor' => $Tutor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutor/add_tutor');
    }


   public function store(Request $request)
   {
        $image = $request->file('image');

        if($request->_token != ''){
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000',
            ]);

            $image_new = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_new);

           TutorModel::create([
                'title'             => $request['title'],
                'description'       => $request['description'],
                'image'             => $image_new,
                'status'            => $request['status'],
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
           ]);

           Session::flash('flash_message', 'succesfully saved.');

           return redirect('/Tutor');
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
       $Tutor = TutorModel::find($id);
       return view('tutor/edit_tutor', ['tutor' => $Tutor]);
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
        $image_name = $request->image;
        $image = $request->file('image');

        if($image != '') {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000'
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }

        $id         = $request['id'];
        $tutor      = TutorModel::find($id);

        $tutor['title']              = $request['title'];
        $tutor['image']              = $image_name;
        $tutor['description']        = $request['description'];
        $tutor['status']             = $request['status'];
        $tutor['updated_at']         = carbon::now();
        $tutor->save();

        Session::flash('flash_message','successfully update.');

        return redirect('/Tutor');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $tutor = TutorModel::find($id);

       $tutor->delete();

       Session::flash('flash_message', 'successfully delete.');

       return redirect('/Tutor');
   }
}
