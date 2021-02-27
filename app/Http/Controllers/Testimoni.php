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

class Testimoni extends Controller
{
    public function index(){
        $testimoni = DB::table('testimoni')
        ->select('*')
        ->orderBy('fullname', 'ASC')
        ->get();

        return view('testimoni',['testimoni' => $testimoni]);
    }

    public function add(){
        return view('add_testimoni');
    }

    public function store(Request $request){
        
        $image_name = $request->image;
        $image = $request->file('image');

        if($image != ''){

            $request->validate([
                'fullname' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000'
            ]);

            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        } else {
            $request->validate([
                'fullname' => 'required'
            ]);
        }

        DB::table('testimoni')->insert([
            'fullname' => $request->fullname,
            'photo' => $image_name,
            'comment' => $request->Comment,
            'from_who' => $request->from_who,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::flash('flash_message', 'successfully saved.');

        return redirect('/testimoni');
    }
}
