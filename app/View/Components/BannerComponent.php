<?php

namespace App\View\Components;

use App\Models\Banner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BannerComponent extends Component
{

    private $banners;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->banners = Banner::where('language', session('language'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.banner-component')->with('banners', $this->banners);
    }
}
