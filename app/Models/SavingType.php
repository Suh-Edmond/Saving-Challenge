<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingType extends Model
{
    use HasFactory;
    protected $guarded = [];

    //define eloquent relationship between user and saving type
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //define eloquent relationship between savings and saving type
    public function savings()
    {
        return $this->hasMany(Savings::class);
    }

    //eloquent relationship between challengetype and savingtype models
    public function challengeType()
    {
        return $this->belongsTo(ChallengeType::class);
    }
    //search challenge type
    public function scopeSearch($query)
    {
        $errormsg = "Null";
        //  return  $query->where('challenge_type', 'LIKE', '%' . request()->challenge_type . '%');
        if (request()->challenge_type != null) {
            $type = ChallengeType::where('challenge_type', 'LIKE', '%' . request()->challenge_type)->pluck('id');
            if ($type == "[]") {
                return $errormsg;
            } else if ($type != "[]") {
                return $query->where('challenge_type_id', '=', $type);
            }
        }
    }
}
