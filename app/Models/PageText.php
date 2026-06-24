<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageText extends Model
{
    use HasFactory;

    protected $table = 'page_text';
    protected $fillable = [
        'text', 
        'key_name',
        'lesson_id',

    ];

    public $timestamps = false;
}

