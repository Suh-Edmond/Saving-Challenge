<?php

namespace App\Http\Controllers;

use App\Models\HasSavingType;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class HasSavingTypeController extends Controller
{
    private $message;
    //add a saving  type to the list of selected savings
    public function store($id)
    {
        $user_id = Auth::user()->id;
        $created = DB::table('has_saving_types')->insert([
            'user_id' => $user_id,
            'saving_type_id' => $id
        ]);
        $this->message = "Saving Challenge Selected!";
        Session::flash('message', $this->message);
        return redirect()->back();
    }

    //delete savings for a saving type
    public function destroy($id)
    {
        $data = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->where('saving_types.id', '=', $id)->select('has_saving_types.*')->delete();
        // $deleted = $data->delete();
        Session::flash('message', "Saving Challenge has been deleted successfully");
        return redirect("/saving/get/challenges/");
    }
}
