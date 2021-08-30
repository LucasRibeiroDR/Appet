<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourDate extends Model
{
    use HasFactory;

    protected $primaryKey = ['date', 'hour'];

    public $incrementing = false;
}
