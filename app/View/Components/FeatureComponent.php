<?php

namespace App\View\Components;

use App\Models\Feature;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeatureComponent extends Component
{

    private $features;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->features = Feature::where('language', session('language'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.feature-component')->with('features', $this->features);
    }
}
