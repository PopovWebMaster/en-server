<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordIt extends Model
{
    use HasFactory;

    protected $table = 'word_it';
    protected $fillable = [
        'it', 
        'ru',
        'transcription',
        'lesson_it_id',

    ];
    public $timestamps = false;
}
