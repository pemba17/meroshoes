<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('backend.pages.dashboard');
    }

    public function __construct()
    {
    	$this->middleware(['admin-middleware','verified']);
    }
}
