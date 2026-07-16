<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordKr extends Model
{
    use HasFactory;

    protected $table = 'word_kr';
    protected $fillable = [
        'kr', 
        'ru',
        'transcription',
        'lesson_kr_id',

    ];
    public $timestamps = false;
}
