<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioEs extends Model
{
    use HasFactory;

    protected $table = 'audio_es';
    protected $fillable = [
        'word_es_id', 
        'lesson_es_id',
        'file_name',
    ];
    public $timestamps = false;
}
