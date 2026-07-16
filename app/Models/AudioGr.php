<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioGr extends Model
{
    use HasFactory;

    protected $table = 'audio_gr';
    protected $fillable = [
        'word_gr_id', 
        'lesson_gr_id',
        'file_name',
    ];
    public $timestamps = false;
}
