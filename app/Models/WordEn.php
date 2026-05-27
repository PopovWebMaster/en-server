<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class WordEn extends Model
{
    use HasFactory;

    protected $table = 'word_en';
    protected $fillable = [
        'en', 
        'ru',
        'transcription',
        'lesson_en_id',


    ];

    public $timestamps = false;
}
