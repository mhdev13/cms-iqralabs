<?php

namespace App\Http\Controllers;

use App\File;
use App\Users;
use App\Groups;
use Carbon\Carbon;
use App\UploadedFile;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\PriceModel;

class Price extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $price = PriceModel::all();

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

            $image_online = $request->file('image');

            $request->validate([
                'package_name' => 'required',
                'price' => 'required',
                'class_type' => 'required',
                'session_type' => 'required',
                'service_type' => 'required',
                'max_student' => 'required',
                'learning_duration' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|max:500000'
            ]);

            if($request->service_type == 'online'){
                $image_name_online = time() . '.' . $image_online->getClientOriginalExtension();
                $image_online->move(public_path('images'), $image_name_online);
            }

            PriceModel::create([
                'package_name' => $request->package_name,
                'price' => $request->price,
                'class_type' => $request->class_type,
                'session_type' => $request->session_type,
                'service_type' => $request->service_type,
                'photo' => isset($image_name_online) ? $image_name_online : null,
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = PriceModel::find($id);
        return view('price/edit_price', ['price' => $price]);
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

            //icon service online
            $image_name_online = $request->image;
            $image_service_online = $request->file('image');

            //validation icon service online
            if($image_service_online != '') {
                $request->validate([
                    'image' => 'mimes:jpeg,jpg,png,gif|required|max:500000',
                    'package_name' => 'required',
                    'price' => 'required',
                    'class_type' => 'required',
                    'session_type' => 'required',
                    'service_type' => 'required',
                    'max_student' => 'required',
                    'learning_duration' => 'required',
                    'description' => 'required'
                ]);

                $image_name_online = time() . '.' . $image_service_online->getClientOriginalExtension();
                $image_service_online->move(public_path('images'), $image_name_online);
            }

            $id = $request['id'];

            $price = PriceModel::find($id);

            $price['package_name']          = $request['package_name'];
            $price['price']                 = $request['price'];
            $price['class_type']            = $request['class_type'];
            $price['session_type']          = $request['session_type'];
            $price['service_type']          = $request['service_type'];
            $price['photo']                 = isset($image_name_online) ? $image_name_online : null;
            $price['max_student']           = $request['max_student'];
            $price['learning_duration']     = $request['learning_duration'];
            $price['description']           = $request['description'];
            $price['updated_at']            = carbon::now();
            $price->save();

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
        $price = PriceModel::find($id);

        $price->delete();

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/price');
    }

    public function getPrice()
    {
        $data = array(
            "status" => 200,
            "response" => "success",
            "data" => DB::table('cms_price')
            ->select("*")
            ->get()
        );

        return $data;
    }
}
