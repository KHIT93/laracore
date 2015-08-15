<?php namespace App\Libraries;

use App\Block;
use App\Setting;
use Symfony\Component\Yaml\Yaml;

class Theme
{
    /**
     * Get the name of the current theme
     * @return string
     */
    public static function current()
    {
        return Setting::get('site_theme');
    }

    /**
     * Find out whether the specified view exists in the current theme
     * and return either the default view path or the view path for the
     * current theme
     * @param $view_name
     * @return string
     */
    public static function template($view_name)
    {
        if (view()->exists(self::current() . '.' . $view_name)) {
            return self::current() . '.' . $view_name;
        } else if (view()->exists(self::current() . '.templates.' . $view_name)) {
            return self::current() . '.templates.' . $view_name;
        } else {
            return 'default.templates.' . $view_name;
        }
    }

    /**
     * Reads the theme_name.yml file and returns the data as a PHP array
     * @param $theme_name
     * @return array|null
     */
    public static function info($theme_name)
    {
        if (file_exists(public_path('themes/' . $theme_name . '/' . $theme_name . '.json'))) {
            return json_decode(file_get_contents(public_path('themes/' . $theme_name . '/' . $theme_name . '.json')), true);
        }
        return null;
    }

    /**
     * Renders the specified section and its containing blocks
     * @param $section_name
     * @return \Illuminate\View\View
     */
    public static function renderSection($section_name)
    {
        return view(self::template('section'), ['blocks' => Block::whereSection($section_name)->get()]);
    }

    /**
     * Renders the view for each single stylesheet to be included in the theme
     * @param null $theme_name
     * @return string
     */
    public static function styles($theme_name = null)
    {
        $styles = "";
        if ($theme_name == null) {
            $theme_info_yml = self::info(self::current());
            if (isset($theme_info_yml['css'])) {
                foreach ($theme_info_yml['css'] as $path) {
                    $styles .= view('partials._style', ['stylesheet' => 'themes/' . self::current() . '/' . $path]) . "\n";
                }
            }

        } else {
            $theme_info_yml = self::info($theme_name);
            if (isset($theme_info_yml['css'])) {
                foreach ($theme_info_yml['css'] as $path) {
                    $styles .= view('partials._style', ['stylesheet' => 'themes/' . $theme_name . '/' . $path]) . "\n";
                }
            }
        }
        return $styles;
    }

    /**
     * Renders the view for each single javascript file to be included in the theme
     * @param null $theme_name
     * @return string
     */
    public static function scripts($theme_name = null)
    {
        $scripts = "";
        if ($theme_name == null) {
            $theme_info_yml = self::info(self::current());
            if (isset($theme_info_yml['js'])) {
                foreach ($theme_info_yml['js'] as $path) {
                    $scripts .= view('partials._script', ['script' => 'themes/' . self::current() . '/' . $path]) . "\n";
                }
            }
        } else {
            $theme_info_yml = self::info($theme_name);
            if (isset($theme_info_yml['js'])) {
                foreach ($theme_info_yml['js'] as $path) {
                    $scripts .= view('partials._script', ['script' => 'themes/' . $theme_name . '/' . $path]) . "\n";
                }
            }
        }
        return $scripts;
    }

    public static function sections($theme_name = null)
    {
        $sections = array();
        if ($theme_name == null) {
            $sections = self::info(Setting::get('site_theme'))['sections'];
        } else {
            $sections = self::info($theme_name)['sections'];
        }
        return $sections;
    }

}
