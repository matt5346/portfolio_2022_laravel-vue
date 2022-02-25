<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioRu extends Model
{
    protected $table = 'portfolio_table_ru';

    use HasFactory;

    protected $fillable = [
        'image_preview',
        'images_array',
        'title',
        'body'
    ];
}
