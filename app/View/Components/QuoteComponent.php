<?php

namespace App\View\Components;

use App\Models\Quote;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuoteComponent extends Component
{

    private $quotes;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->quotes = Quote::where('language', session('language'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.quote-component')->with('quotes', $this->quotes);
    }
}
