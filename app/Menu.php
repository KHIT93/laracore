<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

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

    public function item_list()
    {
        $output = [0 => '<' . $this->name . '>'];
        foreach ($this->items as $item) {
            $output[$item->id] = $item->name;
        }
        return $output;
    }

}
