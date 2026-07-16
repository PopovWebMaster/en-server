<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioDe extends Model
{
    use HasFactory;

    protected $table = 'audio_de';
    protected $fillable = [
        'word_de_id', 
        'lesson_de_id',
        'file_name',
    ];
    public $timestamps = false;
}
