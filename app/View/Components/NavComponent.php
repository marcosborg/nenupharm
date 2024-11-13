<?php

namespace App\View\Components;

use App\Models\Navigation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavComponent extends Component
{

    private $navigations;
    private $language;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->navigations = Navigation::where('language', session('language'))->orderBy('position')->get();
        if (session('language')) {
            $this->language = session('language');
        } elseif (config('panel.primary_language')) {
            $this->language = config('panel.primary_language');
        }

        if (isset($language)) {
            app()->setLocale($language);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-component')->with([
            'navigations' => $this->navigations,
            'language' => $this->language
        ]);
    }
}
