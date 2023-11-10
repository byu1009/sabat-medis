<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CounterReg extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'counter_reg',
        'counter_date',
        'counter_time',
        'counter_prefix',
        'counter_num',
        'counter_queue',
        'counter_eksekutif',
        'counter_status',
        'counter_user'
    ];
}
