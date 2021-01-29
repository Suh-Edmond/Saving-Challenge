<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasSavingType extends Model
{
    use HasFactory;
    protected $guarded = [];

    //define eloquent relationships between savings and saving_type
    public function saving_type()
    {
        return $this->belongsTo(SavingType::class);
    }
    //define eloquent relationships between savings and users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
