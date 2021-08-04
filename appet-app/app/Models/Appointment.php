<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $dates =['dia_consulta'];

    protected $guarded = [];

    public function user_appointment(){
        return $this->belongsTo(App\Models\User);
    }

    public function pet_appointment(){
        return $this->belongsTo(App\Models\Pet);
    }
}