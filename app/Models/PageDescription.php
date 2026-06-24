<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDescription extends Model
{
    use HasFactory;

    protected $table = 'page_description';

    protected $fillable = [
        'description', 
        'key_name',
        'lesson_id',

    ];

    public $timestamps = false;

}
