<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BaseModel
 * @package App\Models
 */
class BaseModel extends Model
{
    use HasFactory, SoftDeletes;
}
