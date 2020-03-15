<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;
use App\UploadedFile;
use App\Products;

class Product extends Controller
{
    public function index(){
    	
    	//mengambil data product
    	$Product = DB::table('products')->get();

    	$User = DB::table('users')->get();

        $countProduct = $Product->count();

        $countUser = $User->count();
    	//mengirim data product ke products view
    	return view('home',['products' => $Product, 'countproduct' => $countProduct, 'countuser' => $countUser]);
    }

    public function add(){
    	return view('add');
    }

    public function store(Request $request){
    	
    	$this->validate($request, [
    		'url' => 'required',
    		'category_name' => 'required',
    		'product_name' => 'required',
    		'fileimage' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
    		'price' => 'required',
    		'description' => 'required',
		]);

		$file = $request->file('fileimage');
		$extension = $file->getClientOriginalExtension();
		$filename = time().".". $extension;
		$upload_directory = 'upload';
		$file->move($upload_directory,$filename);

		Products::create([
			'url' => $request->url,
    		'category_name' => $request->category_name,
    		'product_name' => $request->product_name,
    		'image' => $filename,
    		'price' => $request->price,
    		'description' => $request->description
		]);

    	return redirect('/product');
    }

    public function detail($id){

		$product = DB::table('products')->where('product_id',$id)->get();
		
		return view('detail',['product' => $product]);
    }
}
