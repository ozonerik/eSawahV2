<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navitem_tree extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icon, $name, $open;
    

    public function __construct($icon, $name, $open)
    {
        $this->icon = $icon;
        $this->name = $name;
        $this->open = $open;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navitem_tree');
    }
}
