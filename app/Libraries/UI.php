<?php namespace App\Libraries;

use App\Setting;
use App\Translation;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UI
{
    public static function translate($string, $args = array())
    {
        $lang = config('app.locale');
        $output = '';
        if ($lang == 'en')
        {
            $output = $string;
        }
        else
        {
            try
            {
                $translation = Translation::where('string', '=', $string)->where('locale', '=', $lang)->firstOrFail();
                if($translation->translation == '' || is_null($translation->translation))
                {
                    $output = $string;
                }
                else
                {
                    $output = $translation->translation;
                }
            }
            catch(ModelNotFoundException $ex)
            {
                Translation::create(['string' => $string, 'translation' => '', 'locale' => $lang]);
            }
        }

        return self::FormatString($output, $args);
    }

    public static function FormatString($string, $args = array())
    {
        // Transform arguments before inserting them.
        foreach ($args as $key => $value) {
            switch ($key[0]) {
                case '@':
                    // Escaped only.
                    $args[$key] = check_plain($value);
                    //$args[$key] = $value;
                    break;

                case '%':
                default:
                    // Escaped and placeholder.
                    //$args[$key] = Sanitize::stringPlaceholder($value);
                    $args[$key] = $value;
                    break;

                case '!':
                    // Pass-through.
            }
        }
        return strtr($string, $args);
    }
}