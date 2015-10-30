<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Http\Request;
use App\Models\Setting;

class ThemeController extends Controller
{

    /**
     * Constructor for adding middleware.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $themes = \File::directories(base_path('public/themes'));
        foreach ($themes as $key => $theme) {
            $themes[$key] = json_decode(file_get_contents($theme . '/' . str_replace(base_path('public/themes') . '/', '', $theme) . '.json'), true);
            $themes[$key]['machine'] = str_replace(base_path('public/themes') . '/', '', $theme);
        }

        return view('admin.themes.index', compact('themes'));
    }

    public function apply($theme)
    {
        if (is_dir(base_path('public/themes/' . $theme)) || $theme == 'default') {
            $setting = Setting::whereKey('site_theme');
            $setting->update(['value' => $theme]);
            \Flash::success('The theme has been changed');
            return redirect('admin/themes');
        } else {
            \Flash::error('The theme does not exist');
            return redirect('admin/themes');
        }
    }

    public function create()
    {

    }
}
