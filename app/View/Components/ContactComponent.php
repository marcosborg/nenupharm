<?php

namespace App\View\Components;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactComponent extends Component
{

    private $contacts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->contacts = Contact::where('language', session('language'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact-component')->with('contacts', $this->contacts);
    }
}