<?php

namespace App\View\Components;

use App\Models\Doctor;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DoctorComponent extends Component
{

    private $doctors;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->doctors = Doctor::where('language', session('language'))->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.doctor-component')->with('doctors', $this->doctors);
    }
}
