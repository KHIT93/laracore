<?php namespace App\Libraries;


use App\Models\TextFilter;

class StrFilter
{

    /**
     * Filter type declaration
     */
    const PLAIN_TEXT = 0;
    const RESTRICTED_HTML = 1;
    const FULL_HTML = 2;
    /**
     * Text filter that removes any html and php tags
     * from the input string and any other tags
     * are escaped with htmlentities()
     * Used with Laracore plain text filter
     * @param $string
     * @return string
     */
    public static function all($string)
    {
        return htmlentities(strip_tags($string));
    }

    /**
     * Customizable filtering option for allowing
     * certain tags to be used
     * Used with Laracore restricted html filter
     * @param $string
     * @param \App\Models\TextFilter $filter|$filter
     * @return string
     */
    public static function some($string, $filter)
    {
        return strip_tags($string, (($filter instanceof TextFilter) ? $filter->allowed_tags : $filter));
    }

    /**
     * Filter that allows any html tag to be used
     * Used with Laracore full html filter
     * @param $string
     * @return mixed
     */
    public static function none($string)
    {
        return $string;
    }
}