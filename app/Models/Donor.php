<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    public $guarded = [];

    public function blood_group()
    {
        return $this->belongsTo(BloodGroup::class);
    }
}
