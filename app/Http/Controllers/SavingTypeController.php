<?php

namespace App\Http\Controllers;

use App\Models\ChallengeType;
use Illuminate\Http\Request;
use App\Models\SavingType;

class SavingTypeController extends Controller
{
    //view all saving types
    public function index()
    {

        if (SavingType::search() == "Null") {
            $saving_types = null;
        } else if (SavingType::search() != "Null") {
            $saving_types = SavingType::search()->select('id', 'challenge_type_id', 'number_of_weeks', 'amount_payable', 'total_amount')->paginate(5);
        }
        return view('saving_type.index', compact("saving_types"));
    }


    //create a saving type
    public function create()
    {
        $challenges = ChallengeType::all();
        return view('saving_type.create', compact('challenges'));
    }
    //add a saving type
    public function store()
    {

        $data = request()->validate([
            'challenge_type_id' => 'required|numeric',
            'number_of_weeks' => 'required|min:1|numeric',
            'amount_payable' => 'required|numeric',
            'total_amount' => 'required|numeric'
        ]);

        SavingType::create($data);
        return redirect()->route('challenges');
    }


    //delete a selected saving type
    public function delete()
    {
    }
}
