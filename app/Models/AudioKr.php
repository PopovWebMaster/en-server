<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioKr extends Model
{
    use HasFactory;

    protected $table = 'audio_kr';
    protected $fillable = [
        'word_kr_id', 
        'lesson_kr_id',
        'file_name',
    ];
    public $timestamps = false;
}
