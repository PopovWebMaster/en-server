<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonPhrases extends Model
{
    use HasFactory;

    protected $table = 'lesson_phrases';

    protected $fillable = [
        'foreign', 
        'ru',
        'key_name',
        'lesson_id',

    ];

    public $timestamps = false;
}

