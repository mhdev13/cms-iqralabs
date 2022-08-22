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

    public function edit($id){
        $order_id = $id;
        $orders = Order::find($order_id);
       
        return view('order/edit_order',['orders' => $orders]);
    }

    public function update(Request $request)
    {   
        $order_id = $request['id'];
        $data = array(
            'status'              => $request['status'],
        );
       
        $update = Order::update($order_id, $data);

        $orders = json_decode($update, TRUE);

        $orders = 0;
        Session::flash('flash_message','successfully update.');

        return redirect('/order');
    }
}
