<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dropdown_select2_multi extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ids, $name, $label, $data, $values, $showval;

    public function __construct($ids, $name, $labe, $data, $values, $showval )
    {
        $this->id=$ids;
        $this->name=$name; 
        $this->label=$label;
        $this->data=$data;
        $this->values=$values;
        $this->showval=$showval;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown_select2_multi');
    }
}
