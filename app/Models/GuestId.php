<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestId extends Model
{
    use HasFactory;

    protected $table = 'guest_id';
    protected $fillable = [
        'last_activity_sec',
    ];
    public $timestamps = false;


    
}
