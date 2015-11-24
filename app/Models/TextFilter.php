<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextFilter extends Model
{
    protected $fillable = [
        'internal_name',
        'name',
        'description',
        'type',
        'allowed_tags',
        'weight'
    ];

    public static function defaults()
    {
        return ['only_text', 'restricted_html', 'full_html'];
    }

    public static function weighted($columns = ['*'])
    {
        return self::orderBy('weight', 'asc')->get($columns);
    }
}
