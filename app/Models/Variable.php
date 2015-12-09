<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Variable extends Model
{
    protected $fillable = [
        'class',
        'name',
        'value'
    ];

    public static function get($class = null, $name = null)
    {
        $returned = null;
        if(is_null($class) && is_null($name))
        {
            return null;
        }
        else if(!is_null($class) && is_null($name))
        {
            $returned = self::whereClass($class)->orderBy('class', 'asc')->get();
        }
        else if(is_null($class) && !is_null($name))
        {
            $returned = self::whereName($name)->orderBy('class', 'asc')->get();
        }
        else
        {
            $returned = self::whereClass($class)->whereName($name)->first();
        }

        return ($returned instanceof self || $returned instanceof Collection) ? $returned : null;
    }

    public function setClassAttribute($class)
    {
        $this->attributes['class'] = (is_object($class)) ? get_class($class) : $class;
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize($value);
    }

    public function getValueAttribute($value)
    {
        return unserialize($value);
    }
}
