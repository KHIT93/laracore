<?php namespace App\Libraries;

use App\Metadata;
use App\Node;
use App\Setting;
use App\User;
use App\PathAlias;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

//use App\Metadata;

class Page
{
    private $_model;
    private $_id;
    private static $_models = ['node', 'user'];
    public $title_prefix = '';
    public $title;
    public $title_suffix = '';
    public $node;
    public $status;
    private static $_instance;

    /**
     * Initialize the properties for the current request
     */
    public static function init()
    {
        $page = (self::$_instance instanceof Page) ? self::$_instance : new Page();
        $url = explode('/', app('request')->path());
        if(in_array($url[0], self::$_models))
        {
            $page->_model = $url[0];
            $page->_id = $url[1];
        }
        else
        {
            $entity = PathAlias::whereAlias(app('request')->path())->first();
            if($entity instanceof Model)
            {
                $page->_model = 'node';
                $page->_id = $entity->nid;
            }
        }
        $page->node = ($page->_id == 0 || is_null($page->_id)) ? Node::find(Setting::get('site_home')): Node::find($page->_id);
        $page->title = ($page->node->title) ? $page->node->title: Setting::get(('site_name'));
        self::$_instance = $page;
        return self::$_instance;
    }

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            return self::init();
        }
        else
        {
            return self::$_instance;
        }
    }

    /**
     * Get the title of the current page
     * @return string
     */
    public function getTitle()
    {
        $title = '';
        if($this->status != Response::HTTP_OK && $this->status != null && $this->status != '')
        {
            switch($this->status)
            {
                case Response::HTTP_NOT_FOUND:
                    $title = 'Page not found';
                    break;
                case Response::HTTP_FORBIDDEN:
                    $title = 'Access denied';
                    break;
                case Response::HTTP_UNAUTHORIZED:
                    $title = 'You do not have access to the resource';
                    break;
                default:
                    $title = 'An error occurred';
                    break;
            }
            $this->title = $title;
            $title .= ' | '. Setting::get('site_name');
        }
        else
        {
            if(isset($this->title))
            {
                $title = $this->title;
            }
            else
            {
                $title = Setting::get('site_name');
            }
        }
        return $title;
    }

    /**
     * Get the metadata / SEO-tags for the current page
     * @return string
     */
    public function getMetaData()
    {
        if($this->_model == 'node')
        {
            $data = Node::find($this->_id);
            $metadata = view('partials._meta', ['name' => 'description', 'content' => $data->metadata()->first()->description]);
            $metadata .= view('partials._meta', ['name' => 'keywords', 'content' => $data->metadata()->first()->keywords]);
            $metadata .= view('partials._meta', ['name' => 'robots', 'content' => $data->metadata()->first()->robots]);
            return $metadata;
        }
        return '';
    }
}