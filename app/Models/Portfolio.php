<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    use HasFactory;

    protected $fillable = [
        'image_preview',
        'images_array',
        'title',
        'body'
    ];
}
