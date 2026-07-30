<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;

    protected $table = 'tests';
    protected $fillable = [
        'title', 
        'description',
        'key_name',
        'level_name',
        'is_active',
        'order',

    ];

    public $timestamps = false;
}
