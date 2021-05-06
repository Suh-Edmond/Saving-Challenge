<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\HasSavingType;
use Illuminate\Support\Facades\DB;
use App\Models\Saving;
use App\Models\SavingType;
use Illuminate\Http\Request;
use Savings;

class SavingController extends Controller
{
    //view all selected savings
    public function index()
    {
        $user_id = Auth::user()->id;
        $saving_challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->join('challenge_types', 'challenge_types.id', '=', 'saving_types.challenge_type_id')
            ->where('users.id', '=', $user_id)
            ->select('saving_types.id', 'challenge_types.challenge_type', 'saving_types.number_of_weeks', 'saving_types.amount_payable', 'saving_types.total_amount')
            ->paginate(5);
        return view('saving.index', compact('saving_challenges'));
        //(($saving_challenges));
    }

    //add savings. need to pass the number of weeks for the challenge
    public function create($id)
    {
        $amount_payable = SavingType::findOrFail($id)->amount_payable;
        //get the last saving that was made for this challenge, so the user can increments his saving
        $last_saving = DB::table('savings')
            ->join('users', 'users.id', '=', 'savings.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('saving_types.id', '=', $id)
            ->select('savings.week_number', 'savings.amount_deposited')
            ->orderBy('savings.created_at', 'desc')->first();
        //dd($last_saving);
        return view("saving.create", compact('id',  'last_saving', 'amount_payable'));
        //dd($number_of_weeks);
    }
    //view all savings of a particular type
    public function show($id)
    {
        $total_amount = SavingType::findOrFail($id)->total_amount;
        $total_balance = $this->totalBalance($id);
        $total_week_number = SavingType::findOrFail($id)->number_of_weeks;
        $savings = DB::table('savings')
            ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
            ->join('users', 'users.id', '=', 'savings.user_id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('saving_types.id', '=', $id)
            ->select('saving_types.id', 'savings.week_number', 'savings.amount_deposited', 'savings.status', 'savings.balance')
            ->paginate(5);
        //dd($savings);
        return view('saving.show', compact('savings', 'id', 'total_amount', 'total_balance', 'total_week_number'));
    }
    //get the total amount deposited for a challenge
    private function totalBalance($challenge_id)
    {
        $total_balance = DB::table('savings')
            ->join('users', 'users.id', '=', 'savings.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('saving_types.id', '=', $challenge_id)
            ->select('savings.balance')
            ->orderBy('savings.created_at', 'desc')->first();
        return $total_balance;
    }
    //add  a new saving to a particular saving type by a owner of the savin type
    public function store($id)
    {
        $saving = request()->validate([
            'week_number' => 'required|numeric',
            'amount_deposited' => 'numeric'
        ]);
        dd($saving);
        // dd(request()->all());
        // $current_balance = DB::table('has_saving_types')
        //     ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
        //     ->join('users', 'users.id', '=', 'has_saving_types.user_id')
        //     ->join('savings', 'saving_types.id', '=', 'savings.saving_type_id')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->where('saving_types.id', '=', $id)
        //     ->select('savings.balance')->orderBy('savings.id', 'DESC')->get()->first();
        // if ($current_balance != null) {
        //     $created = Saving::insert([
        //         'week_number' => $saving['week_number'],
        //         'amount_deposited' => $saving['amount_deposited'],
        //         'status' => 1,
        //         'balance' => $saving['amount_deposited'] + $current_balance->balance,
        //         'saving_type_id' => $id,
        //         'user_id' => Auth::user()->id
        //     ]);
        // } else if ($current_balance == null) {
        //     $created = Saving::insert([
        //         'week_number' => $saving['week_number'],
        //         'amount_deposited' => $saving['amount_deposited'],
        //         'status' => 1,
        //         'balance' => $saving['amount_deposited'] + 0,
        //         'saving_type_id' => $id,
        //         'user_id' => Auth::user()->id
        //     ]);
        // }
        return redirect()->route('challenges_show', $id);
        //dd($current_balance);
    }
}
