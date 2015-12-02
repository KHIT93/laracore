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


    /**
     * Gets all user created blocks
     * @param $query
     */
    public function scopeCustom($query)
    {
        $query->where('module', '=', 'block');
    }
    /**
     * Render block
     * @return View|string
     */
    public function render()
    {
        $pages = explode(',', $this->pages);
        $url = app('request')->path();
        $regex = '/\*.*$/';
        /**
         * The block should only show when
         * the current url is in the listed
         * pages
         */
        if ($this->visibility == 0)
        {
            $result = false;
            foreach($pages as $page)
            {
                $item = preg_replace($regex, '', $page);
                $citem = substr($url, 0, strlen($item));
                if ($citem == $item)
                {
                    $result = true;
                    break;
                }
            }
            /**
             * URL matches the pattern and $this->pages is not blank
             */
            if ($result && $pages[0] != '')
            {
                return view(Theme::template('block'), ['block' => $this]);
            }
            /**
             * We are on the frontpage
             * show the block if the
             * <front placeholder
             * is in the array
             */
            else if ($url == '/' && in_array('<front>', $pages))
            {
                return view(Theme::template('block'), ['block' => $this]);
            }
        }
        /**
         * The block should only show when
         * the current url is not in the
         * listed pages
         */
        else if ($this->visibility == 1) {
            /**
             * $this->pages is blank and if we are on the frontpage
             * the placeholder <front> is not in the array
             */
            if ($pages[0] == '' && !($url == '/' && in_array('<front>', $pages)))
            {
                return view(Theme::template('block'), ['block' => $this]);
            }
            /**
             * If the URL matches the pattern then it should not show
             */
            else
            {
                $result = true;
                foreach($pages as $page)
                {
                    $item = preg_replace($regex, '', $page);
                    $citem = substr($url, 0, strlen($item));
                    if ($citem == $item)
                    {
                        $result = false;
                    }
                }
                return ($result) ? view(Theme::template('block'), ['block' => $this]) : '';
            }
        }
    }
}
