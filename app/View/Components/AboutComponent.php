<?php

namespace App\View\Components;

use App\Models\About;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutComponent extends Component
{

    private $abouts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->abouts = About::where('language', session('language'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-component')->with('abouts', $this->abouts);
    }
}
