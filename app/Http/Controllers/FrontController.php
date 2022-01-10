<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Photo;

use App\Models\Product;

use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function home()
    {
    	$data=Photo::select('*')
                ->groupBy('product_id')
                ->get();
    	
    	return view('frontend.pages.home',compact('data'));
    }

    public function productDetail($id)
    {
    	$photoData=Photo::where('product_id',$id)
    						->get();					

    	$productData=Product::find($id);

        $photoSingleData=Photo::where('product_id',$id)->first();

    	return view('frontend.pages.product_detail',compact('photoData','productData','photoSingleData'));
    }
}
