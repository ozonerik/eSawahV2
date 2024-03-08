<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input_currency extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ids, $types, $name, $placeholder, $label, $disabled, $wajib;

    public function __construct($ids, $types, $name, $placeholder, $label, $disabled,$wajib)
    {
        $this->ids = $ids;
        $this->types = $types; 
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->disabled = $disabled;
        $this->wajib = $wajib;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input_currency');
    }
}
