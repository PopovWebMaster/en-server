<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestLessons extends Model
{
    use HasFactory;

    protected $table = 'test_lessons';
    protected $fillable = [
        'test_id', 
        'key_name',
        'lesson_id',
    ];

    public $timestamps = false;
}
