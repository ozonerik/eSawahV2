<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input_form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ids, $types, $name, $placeholder, $label;

    public function __construct($ids, $types, $name, $placeholder, $label)
    {
        $this->ids = $ids;
        $this->types = $types; 
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input_form');
    }
}
