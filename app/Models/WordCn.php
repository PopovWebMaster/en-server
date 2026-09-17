<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordCn extends Model
{
    use HasFactory;

    protected $table = 'word_cn';
    protected $fillable = [
        'cn', 
        'ru',
        'transcription',
        'lesson_cn_id',
        'part_of_speech_id',
        'topic_id',

    ];
    public $timestamps = false;
}
