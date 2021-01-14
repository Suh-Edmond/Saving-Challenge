<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\HasSavingType;
use Illuminate\Support\Facades\DB;
use App\Models\Saving;
use Illuminate\Http\Request;
use Savings;

class SavingController extends Controller
{
    //view all selected savings
    public function index()
    {
        $user_id = Auth::user()->id; // fake user id
        $saving_challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->where('users.id', '=', $user_id)
            ->select('saving_types.id', 'saving_types.challenge_type', 'saving_types.number_of_weeks', 'saving_types.total_amount')
            ->get();
        return view('saving.index', compact('saving_challenges'));
        //dd(count($saving_challenges));
    }

    //add savings
    public function create($id)
    {
        $number_of_weeks = DB::table('savings')
            ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
            ->where('saving_types.id', '=', $id)
            ->select('saving_types.id', 'savings.week_number')
            ->get();
        return view("saving.create", compact('id', 'number_of_weeks'));
        //dd($number_of_weeks);
    }
    //view all savings of a particular type
    public function show($id)
    {
        $savings = DB::table('savings')
            ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
            ->where('saving_types.id', '=', $id)
            ->select('saving_types.id', 'savings.week_number', 'savings.amount_deposited', 'savings.status', 'savings.balance')
            ->get();

        return view('saving.show', compact('savings', 'id'));
    }
    //add  a new saving to a particular saving type by a owner of the savin type
    public function store($id)
    {
        $saving = request()->validate([
            'week_number' => 'required|min:1',
            'amount_deposited' => 'required',
        ]);
        $current_balance = DB::table('has_saving_types')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('savings', 'saving_types.id', '=', 'savings.saving_type_id')
            ->where('users.id', '=', Auth::user()->id)
            ->where('saving_types.id', '=', $id)
            ->select('savings.balance')->orderBy('savings.id', 'DESC')->get()->first();
        if ($current_balance != null) {
            $created = Saving::insert([
                'week_number' => $saving['week_number'],
                'amount_deposited' => $saving['amount_deposited'],
                'status' => 1,
                'balance' => $saving['amount_deposited'] + $current_balance->balance,
                'saving_type_id' => $id
            ]);
        } else if ($current_balance == null) {
            $created = Saving::insert([
                'week_number' => $saving['week_number'],
                'amount_deposited' => $saving['amount_deposited'],
                'status' => 1,
                'balance' => $saving['amount_deposited'] + 0,
                'saving_type_id' => $id
            ]);
        }
        return redirect("saving/get/challenges/$id");
        ($current_balance);
    }
}
