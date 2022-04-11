<?php

namespace App\View\Components;

use Illuminate\View\Component;

class info_box extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $icon, $message, $value, $type;
    public function __construct($icon, $message, $value, $type)
    {
        $this->icon = $icon;
        $this->message = $message; 
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.info_box');
    }
}
