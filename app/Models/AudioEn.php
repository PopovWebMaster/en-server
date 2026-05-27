<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioEn extends Model
{
    use HasFactory;

    protected $table = 'audio_en';
    protected $fillable = [
        'word_en_id', 
        'lesson_en_id',
        'file_name',



    ];

    public $timestamps = false;
}
