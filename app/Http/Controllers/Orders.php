<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Order; 
use Codexshaper\WooCommerce\Facades\Product; 
use Illuminate\Support\Facades\Session;

class Orders extends Controller
{
    public function getOrder(){
        
        $orders = Order::all();
    
        return view('order/order',['orders' => $orders]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        
        return view('order/add_order', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            //insert payment
            'payment_method_title' => $request['payment_method_title'],

            //insert billing
            'billing' => [
                'first_name' => $request['first_name'],
                'last_name'  => $request['last_name'],
                'email'      => $request['email'],
                'phone'      => $request['phone'],
                'email'      => $request['email'],
                'address_1'  => $request['address_1'],
                'city'       => $request['city'],
                'total'      => $request['total']
            ],

            //insert status
            'status' => $request['status'],

            //insert items
            'line_items'           => [
                [
                    'product_id' => 40,
                    'quantity'   => 1,
                ]
            ],
        );
        
        $order = Order::create($data);

        Session::flash('flash_message', 'succesfully saved.');

        return redirect('/order');
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
            //update payment
            'payment_method_title'      => $request['payment_method_title'],

            //update billing
            'billing' => [
                'first_name'            => $request['first_name'],
                'last_name'             => $request['last_name'],
                'email'                 => $request['email'],
                'phone'                 => $request['phone'],
                'email'                 => $request['email'],
                'address_1'             => $request['address_1'],
                'city'                  => $request['city'],
            ],

            //update status
            'status'                    => $request['status'],
        );
       
        $update = Order::update($order_id, $data);

        $orders = json_decode($update, TRUE);

        $orders = 0;

        Session::flash('flash_message','successfully update.');

        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_id = $id;
        $options = ['force' => true]; // Set force option true for delete permanently. Default value false
       
        $order = Order::delete($order_id, $options);

        Session::flash('flash_message', 'successfully delete.');

        return redirect('/order');
    }
}
