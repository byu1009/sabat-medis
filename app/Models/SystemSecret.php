<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SystemSecret extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'secr_used',
        'secr_url_local',
        'secr_url_target',
        'secr_const_id',
        'secr_secret_key',
        'secr_user_key',
        'secr_status'
    ];
}
