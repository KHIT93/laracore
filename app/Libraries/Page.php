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
    public $entity;
    public $status;
    public $metadata;
    private static $_instance;

    /**
     * Initialize the properties for the current request
     */
    public static function init()
    {
        logger('Page: Page::init - start');
        $page = (self::$_instance instanceof Page) ? self::$_instance : new Page();
        $url = explode('/', app('request')->path());
        logger('Page: Page::init - URL split');
        if (in_array($url[0], self::$_models))
        {
            logger('Page: Page::init - model match start');
            $page->_model = $url[0];
            if ($page->entity instanceof Node)
            {
                logger('Page: Page::init - model match node');
                $page->_model = 'node';
                $page->_id = $page->entity->nid;
            }
            else if($page->entity instanceof User)
            {
                logger('Page: Page::init - model match user');
                $page->_model = 'user';
                $page->_id = $page->entity->uid;
            }
            logger('Page: Page::init - model match done');
        }
        else
        {
            logger('Page: Page::init - no model match start');
            $entity = PathAlias::whereAlias(app('request')->path())->first()->node()->first();
            logger('Page: Page::init - entity resolved');
            if ($entity instanceof Node)
            {
                logger('Page: Page::init - entity model match node');
                $page->_model = 'node';
                $page->_id = $entity->nid;
            }
            else if($entity instanceof User)
            {
                logger('Page: Page::init - entity model match user');
                $page->_model = 'user';
                $page->_id = $entity->uid;
            }
            logger('Page: Page::init - no model match done');
        }
        logger('Page: Page::init - set page title');
        $page->title = ($page->title) ? $page->title : Setting::get(('site_name'));
        logger('Page: Page::init - get metadata');
        $page->getMetaData();
        logger('Page: Page::init - set Page instance');
        self::$_instance = $page;
        logger('Page: Page::init - done');
        return self::$_instance;
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Page();
        }
        return self::$_instance;
    }

    /**
     * Get the title of the current page
     * @return string
     */
    public function getTitle()
    {
        $title = '';
        if ($this->status != Response::HTTP_OK && $this->status != null && $this->status != '')
        {
            switch ($this->status)
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
            $title .= ' | ' . Setting::get('site_name');
        }
        else
        {
            if (isset($this->title))
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
        logger('Page: Page->getMetaData - start');
        if ($this->_model == 'node' && isset($this->_id)) {
            logger('Page: Page->getMetaData - model match node');
            $data = Node::find($this->_id);
            logger('Page: Page->getMetaData - populate metadata');
            $metadata = '';
            $metadata = view('partials._meta', ['name' => 'description', 'content' => $data->metadata()->first()->description]);
            $metadata .= view('partials._meta', ['name' => 'keywords', 'content' => $data->metadata()->first()->keywords]);
            $metadata .= view('partials._meta', ['name' => 'robots', 'content' => $data->metadata()->first()->robots]);
            $metadata .= view('partials._meta_link', ['rel' => 'shortlink', 'href' => '/node/'.$data->nid]);
            $this->metadata = $metadata;
            return $metadata;
        }
        logger('Page: Page->getMetaData - done');
        return '';
    }
}