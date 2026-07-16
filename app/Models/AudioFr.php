<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioFr extends Model
{
    use HasFactory;

    protected $table = 'audio_fr';
    protected $fillable = [
        'word_fr_id', 
        'lesson_fr_id',
        'file_name',
    ];
    public $timestamps = false;
}
