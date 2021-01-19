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
    private $finish_challenges;
    private $zero_challenges = 0;
    private $non_comply_challenges = 0;
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
        $saving_types = SavingType::paginate(5);
        $challenges = $this->getSelectedChallenges();
        // $finish_challenges = $this->getFinishChallenges();
        // $zero_challenges = $this->getZeroSavingChallenges();
        return view('home', compact("saving_types", "challenges",));
        //dd($challenges);
    }
    //count the number of selected challenges
    private function getSelectedChallenges()
    {
        $user_id = Auth::user()->id;
        $challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->where('users.id', '=', $user_id)
            ->select('saving_types.id')
            ->count();
        return $challenges;
        //dd($challenges);
    }
    //get finished challeneges
    // private function getFinishChallenges()
    // {
    //     $user_id = Auth::user()->id;
    //     $challenges = $this->getSelectedChallenges();
    //     for ($i = 0; $i <= count($challenges); $i++) {
    //         $finish_challenges = DB::table('savings')
    //             ->join('users', 'users.id', '=', 'savings.user_id')
    //             ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
    //             ->where('users.id', '=', $user_id)
    //             ->where('saving_types.id',  '=', $challenges[$i]->id)
    //             // ->where('savings.balance', '=', 'saving_types.total_amount')
    //             ->select('saving_types.id')->count();
    //         dd($finish_challenges);
    //     }

    //     // dd($challenges[0]);
    // }
    //get challenges with zero savings
    // private function getZeroSavingChallenges()
    // {
    //     $user_id = Auth::user()->id;
    //     $challenges = $this->getSelectedChallenges();
    //     for ($i = 0; $i < $challenges; $i++) {
    //         $this->zero_challenges += DB::table('savings')
    //             ->join('users', 'users.id', '=', 'savings.user_id')
    //             ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
    //             ->where('users.id', '=', $user_id)
    //             ->where('saving_types.id',  '=', $i)
    //             ->where('savings.balance', '=', "[]")
    //             ->select('saving_types.id')->count();
    //     }
    //     //dd($this->zero_challenges);
    //     return $this->zero_challenges;
    // }
    //get non complied challenge
    private function  getNonCompliedChallenges()
    {
    }
}
