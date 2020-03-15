<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //mengambil data product
        $Product = DB::table('products')->get();

        $User = DB::table('users')->get();

        $countProduct = $Product->count();

        $countUser = $User->count();

        //mengirim data product
        return view('index',['products' => $Product, 'countproduct' => $countProduct, 'countuser' => $countUser]);
    }
}
