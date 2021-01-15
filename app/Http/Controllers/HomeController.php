<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingType;
use Illuminate\Support\Facades\Auth;
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
        $saving_types = SavingType::all();
        $challenges = $this->getSelectedChallenge();
        return view('home', compact("saving_types"));
    }
    //count the number of selected challenges
    public function getSelectedChallenge()
    {
        $user_id = Auth::user()->id;
        $challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->where('users.id', '=', $user_id)
            ->select('saving_types.id')
            ->count();
        return compact('challenges');
        //dd($challenges);
    }

    public function getNoBalance()
    {
        $user_id = Auth::user()->id;
        $zero_saving_challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->join('savings', 'saving_types.id', '=', 'savings.saving_type_id')
            ->where('users.id', '=', $user_id)
            ->where('savings.balance', '=', 0)
            ->select('saving_types.id')->count();
        //  dd($zero_saving_challenges);
        // return view('saving.index', compact('zero_saving_challenges'));
    }
}
