<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterComponent extends Component
{
    public $jsFile;
    /**
     * Create a new component instance.
     */
    public function __construct($jsFile = null)
    {
        $this->jsFile = $jsFile;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
