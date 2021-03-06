<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

        return redirect()->route(request()->user()->role);
    }
    public function admin()
    {
        return view('admin.dashboard');
    }
    public function vendor()
    {
        return view('home');
    }
    public function customer(){
        return view('home');

    }
}
