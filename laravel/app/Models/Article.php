<?php

namespace App\Models;

/**
 * Class Article
 * @package App\Models
 */
class Article extends BaseModel
{
    protected $fillable = [
        'source_id',
        'source_name',
        'api',
        'author',
        'title',
        'description',
        'category',
        'url',
        'image',
        'published_at'
    ];

}
