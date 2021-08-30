<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $dates =['date'];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function pet(){
        return $this->belongsTo('App\Models\Pet');
    }

    public function hourDate(){
        return $this->belongsTo('App\Models\Hour');
    }
}
