<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Posts;
use Illuminate\Http\Request;

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
    public function index(){

        $customers = Customer::all();
        return view('customer.All_customer', compact('customers'));

    }
    public function dashboard(){

        return view('dashboard.dashboard');

    }
    public function userCreate(){
        return view('layouts.user-create');
    }
}
