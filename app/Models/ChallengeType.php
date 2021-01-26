<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeType extends Model
{
    use HasFactory;
    protected $guarded = [];

    //eloquent relationship between challenge type and saving type
    public function savingTypes()
    {
        return $this->hasMany(SavingType::class);
    }
}
