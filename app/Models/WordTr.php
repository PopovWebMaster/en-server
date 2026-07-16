<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordTr extends Model
{
    use HasFactory;

    protected $table = 'word_tr';
    protected $fillable = [
        'tr', 
        'ru',
        'transcription',
        'lesson_tr_id',

    ];
    public $timestamps = false;
}
