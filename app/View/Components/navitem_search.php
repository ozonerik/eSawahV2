<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navitem_search extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $target, $placeholder;
    
    public function __construct($target, $placeholder)
    {
        $this->target = $target;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navitem_search');
    }
}
