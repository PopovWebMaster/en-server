<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageKeyWords extends Model
{
    use HasFactory;

    protected $table = 'page_keywords';

    protected $fillable = [
        'keywords', 
        'key_name',
        'lesson_id',
    ];

    public $timestamps = false;
}


