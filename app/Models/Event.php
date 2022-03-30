<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['registration_end_date','event_start_date', 'event_end_date'];
}
