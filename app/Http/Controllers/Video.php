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

class Video extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = DB::table('mau_video')
        ->select('*')
        ->get();

        return view('video/video',['video' => $video]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video/add_video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = $request->file('video');

        if($video != ''){
            $request->validate([
                'video' => 'required|file|mimetypes:video/mp4',
            ]);

            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('images'), $video_name);
        } 
        
        DB::table('mau_video')->insert([
            'title' => $request->title,
            'video' => $video_name,
            'description' => $request->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::flash('flash_message', 'successfully saved.');

        return redirect('/video');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = DB::table('mau_video')
            ->select('*')
            ->where('id', $id)
            ->get();

        return view('video/edit_video', ['video' => $video]);
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
        $video = $request->file('video');
        
        if($video != ''){
            $request->validate([
                'video' => 'required|file|mimetypes:video/mp4',
            ]);

            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('images'), $video_name);
        } 

        DB::table('mau_video')
            ->where('id', $request->id)
            ->update([
                'title' => $request->title,
                'video' => $video_name,
                'description' => $request->description,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        Session::flash('flash_message','successfully update.');

        return redirect('/video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mau_video')->where('id',$id)->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/video');
    }

    public function getVideo(){
        $data = array(
            "status" =>200,
            "response" => "success",
            "data" =>DB::table('mau_video')
            ->select('*')
            ->whereNotNull('photo')
            ->orderBy('fullname', 'ASC')
            ->get()
        );

        return $data;
    }
}
