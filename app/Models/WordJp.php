<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordJp extends Model
{
    use HasFactory;

    protected $table = 'word_jp';
    protected $fillable = [
        'jp', 
        'ru',
        'transcription',
        'lesson_jp_id',

    ];
    public $timestamps = false;
}
