<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_section2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $width, $order, $smallorder, $name, $type;
    public function __construct( $width, $order, $smallorder, $name, $type )
    {
        $this->width = $width;
        $this->name = $name;
        $this->order = $order;
        $this->smallorder = $smallorder;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_section2');
    }
}
