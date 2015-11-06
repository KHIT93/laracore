<?php namespace App\Models;

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
        'visibility',
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
        /*if ($this->module == 'system' && $this->delta == 'main')
        {
            if(Page::getInstance()->entity instanceof \App\Node)
            {
                return view(Theme::template('node'), ['node' => Page::getInstance()->entity]);
            }
            else if(Page::getInstance() instanceof \App\User)
            {
                return view('users.profile', ['user' => Page::getInstance()->entity]);
            }

        }
        else
        {*/
        $pages = explode(',', $this->pages);
        $raw = app('request')->path();
        $extract = substr($raw, 0, strpos($raw, "/*"));
        $url = $raw;
        if ($this->visibility == 0)
        {
            if (in_array($url, $pages))
            {
                return view(Theme::template('block'), ['block' => $this]);
            }
            else if ($url == '/' && in_array('<front>', $pages))
            {
                return view(Theme::template('block'), ['block' => $this]);
            }
        }
        else if ($this->visibility == 1) {
            if (!in_array($url, $pages) && !($url == '/' && in_array('<front>', $pages)))
            {
                return view(Theme::template('block'), ['block' => $this]);
            }
        }
        //}
    }
}
