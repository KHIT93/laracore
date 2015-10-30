<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    protected $fillable = [
        'mid',
        'name',
        'link',
        'parent',
        'position',
        'active',
        'icon'
    ];

    public $childs = array();

    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'mid');
    }

    public function children()
    {
        return $this->hasMany(\App\Models\MenuItem::class, 'parent', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\MenuItem::class, 'id', 'parent');
    }

}
