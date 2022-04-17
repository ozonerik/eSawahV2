<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $width, $order, $smallorder, $name, $closeto;
    public function __construct( $width, $order, $smallorder, $name, $closeto )
    {
        $this->width = $width;
        $this->name = $name;
        $this->order = $order;
        $this->smallorder = $smallorder;
        $this->closeto = $closeto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_form');
    }
}
