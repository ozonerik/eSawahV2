<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navitem_menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $routename;
    public $name;
    public $icon;

    public function __construct($routename, $name, $icon)
    {
        $this->routename = $routename;
        $this->name = $name;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navitem_menu');
    }
}
