<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordEs extends Model
{
    use HasFactory;

    protected $table = 'word_es';
    protected $fillable = [
        'es', 
        'ru',
        'transcription',
        'lesson_es_id',

    ];
    public $timestamps = false;
}
