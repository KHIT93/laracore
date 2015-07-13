<?php namespace App;

use App\Libraries\Page;
use App\Libraries\Theme;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{

    protected $fillable = [
        'module',
        'delta',
        'theme',
        'position',
        'section',
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
        if($this->module == 'system' && $this->delta == 'main')
        {
            return view(Theme::template('node'), ['node' => Page::getInstance()->node]);
        }
        else
        {
            return view(Theme::template('block'), ['block' => $this]);
        }
    }
}
