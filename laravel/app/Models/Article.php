<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_id',
        'source_name',
        'api',
        'author',
        'title',
        'description',
        'category',
        'url',
        'url_to_image',
        'published_at'
    ];

}
