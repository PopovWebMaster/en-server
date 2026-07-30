<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPageKeywords extends Model
{
    use HasFactory;
    protected $table = 'test_page_keywords';
    protected $fillable = [
        'test_id', 
        'key_name',
        'keywords',
    ];

    public $timestamps = false;
}
