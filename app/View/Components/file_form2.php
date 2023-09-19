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
    public $ids, $name, $label, $placeholder;

    public function __construct($ids, $name, $label, $placeholder)
    {
        $this->ids = $ids;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder =$placeholder;
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
