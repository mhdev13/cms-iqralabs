<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Coupon;
use Illuminate\Support\Facades\Session;

class Coupons extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('coupon/coupon',['coupons' => $coupons]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon/add_coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'code' => $request['code'],
            'discount_type' => $request['discount_type'],
            'amount' => $request['amount'],
            'individual_use' => true,
            'exclude_sale_items' => true,
            'description' => $request['desc'],
            'date_expires' => $request['date_expires_gmt'],
        ];
        
        $coupon = Coupon::create($data);

        Session::flash('flash_message', 'succesfully saved.');

        return redirect('/coupon');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon_id = $id;
       
        $coupons = Coupon::find($coupon_id);
          
        return view('coupon/edit_coupon',['coupons' => $coupons]);
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
        $coupon_id = $request['id'];
        
        $data = array(
            'code'                    => $request['code'],
            'discount_type'           => $request['discount_type'],
            'amount'                  => $request['amount'],
            'description'             => $request['desc'],
            'date_expires'            => $request['date_expires_gmt']
        );
       
        $update = Coupon::update($coupon_id, $data);

        $coupons = json_decode($update, TRUE);

        $coupons = 0;

        Session::flash('flash_message','successfully update.');

        return redirect('/coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon_id = $id;
        $options = ['force' => true]; // Set force option true for delete permanently. Default value false

        $coupon = Coupon::delete($coupon_id, $options);

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/coupon');
    }
}
