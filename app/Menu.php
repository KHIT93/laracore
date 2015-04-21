<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	protected $fillable = [
            'name',
            'description',
        ];
        /**
        * Alter the primary key
        * @var string 
        */
        protected $primaryKey = 'mid';
        
        public function items()
        {
            return $this->hasMany('App\MenuItem', 'mid');
        }

}
