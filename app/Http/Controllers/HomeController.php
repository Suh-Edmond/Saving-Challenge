<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppController;
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
    private $completed_challenges = 0;
    private $zero_challenges = 0;
    public $finish_challenges = [];
    private $zero_saving_challenges;
    public function __construct()
    {
        $this->middleware('auth');
        //  $this->notify = new AppController();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if (SavingType::search()->get() == "[]") {
            $saving_types = "Not Found";
        } else if (SavingType::search()->get() != "[]") {
            $saving_types =  SavingType::search()->paginate(5);
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
                } else {
                    $this->completed_challenges += 0;
                }
            }
        }
        return ($this->completed_challenges);
    }
    //get details of finished challeneges
    private function DetailedCompletedChallenges()
    {
        $user_id = Auth::user()->id;
        $challenges = $this->getSelectedChallenges();
        for ($i = 0; $i <  count($challenges); $i++) {
            $finish_challenges = DB::table('savings')
                ->join('users', 'users.id', '=', 'savings.user_id')
                ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('users.id', '=', $user_id)
                ->where('saving_types.id',  '=', $challenges[$i]->id)
                ->select('saving_types.*', 'savings.*')
                ->orderBy('savings.id', 'DESC')->first();
            if ($finish_challenges != null) {
                if ($finish_challenges->balance == $finish_challenges->total_amount) {
                    array_push($this->finish_challenges, $finish_challenges);
                } else {
                    continue;
                }
            }
        }
        return ($this->finish_challenges);
    }
    public function getDetailCompletedChallenges()
    {
        $completed = $this->DetailedCompletedChallenges();
        // dd($completed);
        return view('home/completedChallenges', compact("completed"));
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
                ->orderBy('savings.id', 'DESC')->first();
            if ($saving == null) {
                $this->zero_challenges += 1;
            }
        }
        return ($this->zero_challenges);
    }
    //get detail for zero saving challenges
    public function  ZeroSavedCahallenges()
    {
        $user_id = Auth::user()->id;
        $challenges = $this->getSelectedChallenges();
        for ($i = 0; $i <  count($challenges); $i++) {
            $this->zero_saving_challenges = DB::table('savings')
                ->join('users', 'users.id', '=', 'savings.user_id')
                ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('users.id', '=', $user_id)
                ->where('saving_types.id',  '=', $challenges[$i]->id)
                ->where('savings.balance', '=', 0)
                ->select('saving_types.*')
                ->orderBy('savings.id', 'DESC')->first();
        }
        $zero_saving_challenges = $this->zero_saving_challenges;
        dd($zero_saving_challenges);
        // return view('home.zeroChallenges', compact('zero_saving_challenges'));
    }
}
