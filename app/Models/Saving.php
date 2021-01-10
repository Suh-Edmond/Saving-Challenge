<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;
    protected $guarded = [];

    //define eloquent relationships between savings and saving_type
    public function saving_type()
    {
        return $this->belongsTo(SavingType::class);
    }
}
