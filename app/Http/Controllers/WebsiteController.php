<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Navigation;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        if (session('language')) {
            $language = session('language');
        } elseif (config('panel.primary_language')) {
            $language = config('panel.primary_language');
            session()->put('language', $language);
        }

        if (isset($language)) {
            app()->setLocale($language);
        }

        $navigation = Navigation::where('language', session('language'))->orderBy('position')->get();

        $contacts = Contact::where('language', session('language'))->get();

        return view('website.index')->with([
            'language' => $language,
            'navigation' => $navigation,
            'contacts' => $contacts
        ]);
    }

    public function changeLanguage($lang)
    {
        session()->put('language', $lang);
        return redirect()->back();
    }
}
