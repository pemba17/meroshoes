<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function dashboard()
    {
    	return view('backend.pages.seller_dashboard');	
    }

    public function __construct()
    {
    	$this->middleware(['seller-middleware','verified']);
    }
}
