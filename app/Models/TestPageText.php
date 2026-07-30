<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPageText extends Model
{
    use HasFactory;
    protected $table = 'test_page_text';
    protected $fillable = [
        'test_id', 
        'key_name',
        'text',
    ];

    public $timestamps = false;
}
