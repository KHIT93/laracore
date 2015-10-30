<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'key',
        'value'
    ];

    public static function get($key)
    {
        $return = self::whereKey($key)->first();
        return ($return instanceof Setting) ? $return->value : null;
    }

}
