<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class HasSavingTypeController extends Controller
{
    //add a saving  type to the list of selected savings
    public function store($id)
    {
        $user_id = 1; //fake user id
        $created = DB::table('has_savings')->insert([
            'user_id' => $user_id,
            'saving_type_id' => $id
        ]);
        Session::flash('message', "Saving Challenges has been added Successfully!");
        return redirect()->back();
        //return redirect()->back()->with('success', 'Saving Challenges has been added Successfully!');
        //dd($created);
    }

    //delete savings for a saving type
    public function destroy($id)
    {
        $data = DB::table('has_savings')
            ->join('users', 'users.id', '=', 'has_savings.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_savings.saving_type_id')
            ->where('saving_types.id', '=', $id)->select('has_savings.*')->delete();
        // $deleted = $data->delete();
        return redirect("/saving/get/challenges/");
    }
}
