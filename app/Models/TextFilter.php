<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextFilter extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'allowed_tags'
    ];
}
