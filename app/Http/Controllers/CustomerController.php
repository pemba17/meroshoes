<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard()
    {
    	return view('backend.pages.customer_dashboard');
    }

     public function __construct()
    {
    	$this->middleware(['customer-middleware','verified']);
    }
}
