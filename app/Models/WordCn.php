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

    ];
    public $timestamps = false;
}
