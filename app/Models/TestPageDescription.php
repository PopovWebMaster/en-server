<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPageDescription extends Model
{
    use HasFactory;
    protected $table = 'test_page_description';
    protected $fillable = [
        'test_id', 
        'key_name',
        'description',
    ];

    public $timestamps = false;
}
