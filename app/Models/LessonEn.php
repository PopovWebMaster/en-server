<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonEn extends Model
{
    use HasFactory;

    protected $table = 'lesson_en';
    protected $fillable = [
        'title', 
        'description',
        'level_name',

    ];

    public $timestamps = false;
}
