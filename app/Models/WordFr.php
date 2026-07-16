<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordFr extends Model
{
    use HasFactory;

    protected $table = 'word_fr';
    protected $fillable = [
        'fr', 
        'ru',
        'transcription',
        'lesson_fr_id',

    ];
    public $timestamps = false;
}
