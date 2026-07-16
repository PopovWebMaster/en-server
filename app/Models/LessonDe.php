<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDe extends Model
{
    use HasFactory;

    protected $table = 'lesson_de';
    protected $fillable = [
        'title', 
        'description',
        'level_name',
        'is_active',
        'order',
        'is_paid',

    ];
    public $timestamps = false;
}
