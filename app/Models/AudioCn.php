<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioCn extends Model
{
    use HasFactory;

    protected $table = 'audio_cn';
    protected $fillable = [
        'word_cn_id', 
        'lesson_cn_id',
        'file_name',
    ];
    public $timestamps = false;
}
