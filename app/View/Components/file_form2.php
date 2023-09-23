<?php

namespace App\View\Components;

use Illuminate\View\Component;

class file_form2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ids, $name, $label, $placeholder, $capture;

    public function __construct($ids, $name, $label, $placeholder, $capture)
    {
        $this->ids = $ids;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder =$placeholder;
        $this->capture= $capture;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file_form2');
    }
}
