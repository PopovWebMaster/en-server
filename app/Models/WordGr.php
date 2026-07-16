<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordGr extends Model
{
    use HasFactory;

    protected $table = 'word_gr';
    protected $fillable = [
        'gr', 
        'ru',
        'transcription',
        'lesson_gr_id',

    ];
    public $timestamps = false;
}
