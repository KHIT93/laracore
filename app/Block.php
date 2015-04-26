<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model {

	protected $fillable = [
            'module',
            'delta',
            'theme',
            'position',
            'visbility',
            'pages',
            'title',
            'description',
            'body'
        ];
        /**
        * Alter the primary key
        * @var string 
        */
        protected $primaryKey = 'bid';

        public function render()
        {
            return view('public.partials._block', ['block' => $this]);
        }
}
