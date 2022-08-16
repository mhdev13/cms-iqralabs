<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Order extends Controller
{
    public function getOrder(){
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://blog.maungaji.co.id/wp-json/wc/v3/orders/');
        $response = $request->getBody();
    
        dd($response);
    }
}
