<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SabatmedisVisit extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'visit_code',
        'visit_name',
        'visit_status'
    ];
}
