<?php

namespace App\Http\Controllers;

use App\Notifications\SavingNotification;
use Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class NotificationController extends Controller
{
    private $fault = [];
    private $failChallenges = [];
    private function getSelectedChallenges($id)
    {
        $user_id = $id;
        $challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->where('users.id', '=', $user_id)
            ->select('saving_types.id')
            ->orderBy('saving_types.created_at', 'asc')
            ->get();
        return $challenges;
    }

    //get  all register users users 
    private function registerUsers()
    {
        $reg_users = User::all()->pluck('id');
        return $reg_users;
    }

    private function getFailedChallenges($challenges, $user_id)
    {
        for ($i = 0; $i < count($challenges); $i++) {
            $user = DB::table('savings')
                ->join('users', 'users.id', '=', 'savings.user_id')
                ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('users.id', '=', $user_id)
                ->where('saving_types.id', '=', $challenges[$i]->id)
                ->select('savings.*')
                ->orderBy('savings.created_at', 'desc')
                ->get();
            if ($user == "[]") {
                array_push($this->fault, $user_id);
            } else if ($user != "[]") {
                for ($j = 0; $j < count($user); $j++) {
                    if ($user[$j] != "[]") {
                        $saving = DB::table('savings')
                            ->join('users', 'users.id', '=', 'savings.user_id')
                            ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                            ->where('users.id', '=', $user[$j]->user_id)
                            ->where('saving_types.id', '=', $user[$j]->saving_type_id)
                            ->select('savings.amount_deposited', 'savings.balance')
                            ->orderBy('savings.id', 'DESC')->first();
                        if ($saving->amount_deposited == $saving->balance) {
                            array_push($this->fault, $user_id);
                        }
                    }
                }
            }
        }
        return ($this->fault);
    }

    public function sendNotification()
    {
        $users = $this->registerUsers();
        $number_of_users = count($users);
        for ($user = 0; $user < $number_of_users; $user++) {
            $user_challenges = $this->getSelectedChallenges($users[$user]);
            $this->failChallenges = $this->getFailedChallenges($user_challenges, $users[$user]);
        }
        $unique_details = array_unique($this->failChallenges); //remove duplicates from the array
        $new_details = array_values($unique_details); //reordering the array indicies
        $notification_data = [
            "name" => 'Saving Challenge Weekly Notification',
            "body" => "Hello, you have not comply to you saving challenge this week, please login to comply"
        ];
        for ($i = 0; $i < count($new_details); $i++) {
            User::findOrFail($new_details[$i])->notify(new SavingNotification($notification_data));
        }
        dd($this->failChallenges);
    }
}
