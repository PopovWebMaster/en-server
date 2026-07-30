<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPageTitle extends Model
{
    use HasFactory;
    protected $table = 'test_page_title';
    protected $fillable = [
        'test_id', 
        'key_name',
        'title',
    ];

    public $timestamps = false;
}
