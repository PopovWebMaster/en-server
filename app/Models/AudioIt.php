<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioIt extends Model
{
    use HasFactory;

    protected $table = 'audio_it';
    protected $fillable = [
        'word_it_id', 
        'lesson_it_id',
        'file_name',
    ];
    public $timestamps = false;
}
