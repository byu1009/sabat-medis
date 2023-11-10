<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CounterValue extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;

    protected $primary_key = 'cvalue_id';

    protected $fillable = [
        'cvalue_name',
        'cvalue_image',
        'cvalue_desc',
        'cvalue_link',
        'cvalue_prefix',
        'cvalue_number',
        'cvalue_status'
    ];
}
