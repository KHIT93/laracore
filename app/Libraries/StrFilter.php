<?php namespace App\Libraries;


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
     * @param $allowed_tags
     * @return string
     */
    public static function some($string, $allowed_tags)
    {
        return strip_tags($string, $allowed_tags);
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