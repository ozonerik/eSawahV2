<?php

namespace App\View\Components;

use Illuminate\View\Component;

class calc_sawah extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $width, $order, $smallorder, $name, $type, $action;
    public function __construct($width, $order, $smallorder, $name, $type, $action)
    {
        $this->width = $width;
        $this->name = $name;
        $this->order = $order;
        $this->smallorder = $smallorder;
        $this->type = $type;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.calc_sawah');
    }
}
