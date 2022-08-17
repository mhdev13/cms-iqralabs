<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Order; 
use Illuminate\Support\Facades\Session;

class Orders extends Controller
{
    public function getOrder(){
        $orders = Order::all();

        return view('order/order',['orders' => $orders]);
    }

    public function edit($order_id,$data){
        
        $data = array(
            'status'              => $data,
        );
       
        $orders = Order::update($order_id, $data);
        // dd($orders);
        // Session::flash('flash_message','successfully update.');
        return $orders;
        
    }
}
