<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dropdown_select2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ids, $name, $label, $data, $values;

    public function __construct($ids, $name, $labe, $data, $values)
    {
        $this->id=$ids;
        $this->name=$name; 
        $this->label=$label;
        $this->data=$data;
        $this->values=$values;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown_select2');
    }
}
