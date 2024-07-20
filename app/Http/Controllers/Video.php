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
        $video = DB::table('cms_video')
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

        $image = $request->file('image_thumbnail');

        if($video != ''){
            $request->validate([
                'video' => 'required|file|mimetypes:video/mp4',
                'image_thumbnail' => 'mimes:jpeg,jpg,png,gif|required|max:500000',
            ]);

            $video_name = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('images'), $video_name);

            $image_thumbnail = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_thumbnail);

            DB::table('cms_video')->insert([
                'title' => $request['title'],
                'video' => $video_name,
                'description' => $request['description'],
                'Status' => $request['status'],
                'image_thumbnail' => $image_thumbnail,
                'Thumbnail' => $request['thumbnail'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Session::flash('flash_message', 'successfully saved.');

            return redirect('/video');

        } else {
            Session::flash('flash_message', 'failde saved.');

            return redirect('/video');
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
        $video = DB::table('cms_video')
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
        $id = $request['id'];

        $checkID = DB::table('cms_video')
        ->select('id')
        ->where('id', $id)
        ->first();

        $video = $request->file('video');

        $image = $request->file('image_thumbnail');

        if(!empty($checkID->id)){

            if(!empty($video) || !empty($image)){
                $video_name = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('images'), $video_name);

                $image_thumbnail = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_thumbnail);

                $update = [
                    'title'          => $request['title'],
                    'video'          => $video_name,
                    'description'    => $request['description'],
                    'status'         => $request['status'],
                    'image_thumbnail'=> $image_thumbnail,
                    'thumbnail'      => $request['thumbnail'],
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now()
                ];

                DB::table('cms_video')
                ->where('id', $id)
                ->update($update);

            } else {

                $update = [
                    'title'          => $request['title'],
                    'video'          => $request['video'],
                    'description'    => $request['description'],
                    'status'         => $request['status'],
                    'image_thumbnail'=> $request['image_thumbnail'],
                    'thumbnail'      => $request['thumbnail'],
                    'created_at'     => Carbon::now(),
                    'updated_at'     => Carbon::now()
                ];

                DB::table('cms_video')
                ->where('id', $id)
                ->update($update);
            }

            Session::flash('flash_message','successfully update.');

            return redirect('/video');

        } else {

            Session::flash('flash_message','failed update.');

            return redirect('/video');
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
        DB::table('cms_video')->where('id',$id)->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/video');
    }

    public function getVideo(){
        $data = array(
            "status" =>200,
            "response" => "success",
            "data" =>DB::table('cms_video')
            ->select('*')
            ->get()
        );

        return $data;
    }
}
