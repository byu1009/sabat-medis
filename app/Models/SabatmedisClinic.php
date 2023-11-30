<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SabatmedisClinic extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'clinic_code',
        'clinic_name',
        'clinic_status'
    ];
}
