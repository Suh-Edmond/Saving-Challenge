<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingType;

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
        $saving_types = SavingType::all();
        return view('home', compact("saving_types"));
    }
}
