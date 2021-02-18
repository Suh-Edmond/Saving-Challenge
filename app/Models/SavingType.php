<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChallengeType;

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

        $Notfound = "Null";
        if (!empty(request()->challenge_type)) {
            $type = ChallengeType::where('challenge_type', 'LIKE', request()->challenge_type . '%')->pluck('id');
            if ($type == "[]") {
                return $Notfound;
            } else {
                return $query->where('challenge_type_id', '=', $type);
            }
        }
    }
}
