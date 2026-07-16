<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioJp extends Model
{
    use HasFactory;

    protected $table = 'audio_jp';
    protected $fillable = [
        'word_jp_id', 
        'lesson_jp_id',
        'file_name',
    ];
    public $timestamps = false;
}
