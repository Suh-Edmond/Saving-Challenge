<?php

namespace App\Http\Controllers;

use App\Models\SavingType;
use App\Notifications\SavingNotification;
use Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class NotificationController extends Controller
{
    private $fault;
    private $failChallenges = [];
    private $failChallengesDetails;
    private $failChallengesId;
    //constructor
    public function __construct()
    {
        $this->failChallengesDetails = [];
        $this->fault = [];
        $this->failChallengesId = [];
    }
    //get all selected challenges for each registered user
    private function getSelectedChallenges($id)
    {
        $challenges = DB::table('has_saving_types')
            ->join('users', 'users.id', '=', 'has_saving_types.user_id')
            ->join('saving_types', 'saving_types.id', '=', 'has_saving_types.saving_type_id')
            ->where('users.id', '=', $id)
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
    //get failed challenges for each user(if it exits)
    private function getFailedChallenges($challenges, $user_id)
    {
        for ($i = 0; $i < count($challenges); $i++) {
            $saving = DB::table('savings')
                ->join('users', 'users.id', '=', 'savings.user_id')
                ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                ->where('users.id', '=', $user_id)
                ->where('saving_types.id', '=', $challenges[$i]->id)
                ->select('savings.*')
                ->orderBy('savings.created_at', 'desc')
                ->get();
            if ($saving == "[]") {
                array_push($this->fault, $user_id);
                array_push($this->failChallengesDetails, $this->challengeDetails($challenges[$i]->id));
            } else if ($saving != "[]") {
                for ($j = 0; $j < count($saving); $j++) {
                    //get the last amount deposited and the current balance of each savings
                    $saving_balance = DB::table('savings')
                        ->join('users', 'users.id', '=', 'savings.user_id')
                        ->join('saving_types', 'saving_types.id', '=', 'savings.saving_type_id')
                        ->where('users.id', '=', $saving[$j]->user_id)
                        ->where('saving_types.id', '=', $saving[$j]->saving_type_id)
                        ->select('savings.amount_deposited', 'savings.balance')
                        ->orderBy('savings.id', 'DESC')->first();
                    //verify if the current balance is equal to the last amount deposited. 
                    //then the user has not comply to the saving for that week
                    if ($saving_balance->amount_deposited == $saving_balance->balance) {
                        array_push($this->fault, $user_id);
                        array_push($this->failChallengesDetails, $this->challengeDetails($challenges[$i]->id));
                    }
                }
            }
        }
        return ($this->fault);
    }
    //send notifications to user
    public function sendNotification()
    {
        $data = []; // used to store data(details) for all failed challenges
        $users = $this->registerUsers();
        $number_of_users = count($users);
        for ($user = 0; $user < $number_of_users; $user++) {
            $user_challenges = $this->getSelectedChallenges($users[$user]); //get all selected challenges for a registered user
            $failChallengesId = $this->getFailedChallenges($user_challenges, $users[$user]); //get id's of all failed challenges
        }
        //formating the data for all failed challenges
        foreach ($this->failChallengesDetails as $index => $value) {
            array_push($data, $this->failChallengesDetails[$index][0]);
        }
        //dd($data);
        // $unique_array_of_challenges = array_unique($data);
        //defining the notification data
        $notification_data = [
            "name" => 'Saving Challenge Weekly Notification',
            "body" => "Hello, you have not comply to you saving challenge this week, please login to comply",
            "data" => $data
        ];
        //send notification message
        for ($i = 0; $i < count($failChallengesId); $i++) {
            User::findOrFail($failChallengesId[$i])->notify(new SavingNotification($notification_data));
        }
    }

    //get the details of each failed challenge
    private function challengeDetails($saving_type)
    {
        $details = DB::table('saving_types')
            ->join('challenge_types', 'challenge_types.id', '=', 'saving_types.challenge_type_id')
            ->where('saving_types.id', '=', $saving_type)
            ->select('challenge_types.challenge_type')->get();

        return $details;
    }
}
