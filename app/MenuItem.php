<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model {

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
            return $this->belongsTo('App\Menu', 'mid');
        }
        public function children()
        {
            return $this->hasMany('App\MenuItem', 'parent', 'id');
        }
        public function parent()
        {
            return $this->belongsTo('App\MenuItem', 'id', 'parent');
        }

}
