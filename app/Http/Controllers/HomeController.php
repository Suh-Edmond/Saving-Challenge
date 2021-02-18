<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppController;
use App\Models\ChallengeType;
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
    private $completed_challenges = 0; // to hold the number of completed challenges
    private $zero_challenges = 0; //to hold the number of zero saving challenges
    private $zero_challenges_id; //array to hold the id's of all zero saved challenges
    private $completed_challenges_id; //array to hold the id's of all completed saved challenges


    public function __construct()
    {
        $this->middleware('auth');
        $this->zero_challenges_id = [];
        $this->completed_challenges_id = [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (SavingType::search() == "Null") {
            $saving_types = null;
        } else {
            $saving_types = SavingType::search()->select('id', 'challenge_type_id', 'number_of_weeks', 'amount_payable', 'total_amount')->paginate(5);
        }
        $challenges = $this->getSelectedChallenges()->count();
        $finish_challenges = $this->getFinishChallenges();
        $zero_challenges = $this->getZeroSavingChallenges();
        //dd($saving_types);
        return view('home.home', compact("saving_types", "challenges", "finish_challenges", "zero_challenges"));
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
            ->get();
        return $challenges;
        //dd($challenges);
    }
    //get finished challeneges
    private function getFinishChallenges()
    {
        $user_id = Auth::user()->id;
        $challenges = $this->getSelectedChallenges();
        for ($i = 0; $i <  count($challenges); $i++) {
            $finish_challenges = DB::table('savings')
                ->join('users', 'users.id', '=', 'savings.user_id')
                ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('users.id', '=', $user_id)
                ->where('saving_types.id',  '=', $challenges[$i]->id)
                ->select('savings.balance', 'saving_types.total_amount')
                ->orderBy('savings.id', 'DESC')->first();
            if ($finish_challenges != null) {
                if ($finish_challenges->balance == $finish_challenges->total_amount) {
                    $this->completed_challenges += 1;
                    array_push($this->completed_challenges_id, $challenges[$i]);
                }
            }
        }
        return ($this->completed_challenges);
    }
    //get details of finished challeneges
    public function getDetailCompletedChallenges()
    {
        $completedChallenge = []; //array to hold the details of all completed challenges
        $this->getFinishChallenges(); //call to method getfinishechallenges to return an array of id's for all finishe challenges

        for ($i = 0; $i < count($this->completed_challenges_id); $i++) {
            $details = DB::table('saving_types')
                ->join('challenge_types', 'challenge_types.id', '=', 'saving_types.id')
                ->join('savings', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('challenge_types.id', '=', $this->completed_challenges_id[$i]->id)
                ->select('challenge_type', 'number_of_weeks', 'amount_payable', 'balance', 'total_amount',)
                ->orderBy('savings.created_at', 'DESC')->get();
            array_push($completedChallenge, $details[0]);
        }

        return view('home/completedChallenges', compact("completedChallenge"));
    }
    //get challenges with zero savings
    private function getZeroSavingChallenges()
    {
        $user_id = Auth::user()->id;
        $challenges = $this->getSelectedChallenges();
        for ($i = 0; $i <  count($challenges); $i++) {
            $saving = DB::table('savings')
                ->join('users', 'users.id', '=', 'savings.user_id')
                ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('users.id', '=', $user_id)
                ->where('saving_types.id',  '=', $challenges[$i]->id)
                ->select('savings.balance')
                ->orderBy('savings.created_at', 'DESC')->first();
            if ($saving == null) {
                $this->zero_challenges += 1;
                array_push($this->zero_challenges_id, $challenges[$i]);
            }
        }

        return ($this->zero_challenges);
    }

    //get the zero saving challenges
    public function ZeroSavedChallenges()
    {
        $types  = [];
        $this->getZeroSavingChallenges(); //call to method get zero saved challenges so as retrive all their id's
        for ($i = 0; $i < count($this->zero_challenges_id); $i++) {
            $details = DB::table('saving_types')
                ->join('challenge_types', 'challenge_types.id', '=', 'saving_types.id')
                ->where('challenge_types.id', '=', $this->zero_challenges_id[$i]->id)
                ->select('challenge_type', 'number_of_weeks', 'amount_payable', 'total_amount')->get();
            array_push($types, $details[0]);
        }
        return view('home.zeroChallenges', compact("types"));
    }
}
