<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Http\Request;
use App\Models\Setting;

class RegionalController extends Controller
{
    /**
     * Generic regional settings
     * @return View
     */
    public function index()
    {
        return view('admin.config.regional.index');
    }

    /**
     * Save regional settings
     * @param Request $request
     * @return Redirect
     */
    public function update(Request $request)
    {
        $setting = Setting::whereKey('site_language')->first();
        $setting->update(['value' => $request->input('site_language')]);
        \Flash::success('Regional settings have been updated');
        return redirect('admin/config/regional');
    }

    /**
     * View strings in the translations table for the specified locale
     * @param null $locale
     * @return View
     */
    public function translateList($locale = null)
    {
        return view('admin.config.regional.translations', ['translations' => Translation::whereLocale(((is_null($locale))?config('app.locale'):$locale))->get()]);
    }

    /**
     * Translate the supplied resource
     * @param Translation $translation
     * @return View
     */
    public function translate(Translation $translation)
    {
        return view('admin.config.regional.translate', ['translation' => $translation]);
    }

    public function updateTranslation(Translation $translation, Request $request)
    {
        $translation->update(['translation' => $request->input('translation')]);
        \Flash::success('Translation has been updated');
        return redirect('admin/config/regional/translate');
    }
}