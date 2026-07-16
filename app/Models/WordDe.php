<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordDe extends Model
{
    use HasFactory;
    
    protected $table = 'word_de';
    protected $fillable = [
        'de', 
        'ru',
        'transcription',
        'lesson_de_id',

    ];
    public $timestamps = false;
}
