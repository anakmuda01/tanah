<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tanah;
use App\Models\Kasir;
use App\Models\Kredit;
use App\Models\Pembeli;
use App\Models\CartItem;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}
