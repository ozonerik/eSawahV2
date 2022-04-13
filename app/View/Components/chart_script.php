<?php

namespace App\View\Components;

use Illuminate\View\Component;

class chart_script extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name, $target, $label, $data, $color, $labelcolor;
    public function __construct($name, $target, $label, $data, $color, $labelcolor)
    {
        $this->name = $name;
        $this->type = $type;
        $this->target = $target;
        $this->label = $label;
        $this->data = $data;
        $this->color = $color;
        $this->labelcolor = $labelcolor;
    }
    public function render()
    {
        return view('components.chart_script');
    }
}
