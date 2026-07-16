<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioTr extends Model
{
    use HasFactory;

    protected $table = 'audio_tr';
    protected $fillable = [
        'word_tr_id', 
        'lesson_tr_id',
        'file_name',
    ];
    public $timestamps = false;
}
