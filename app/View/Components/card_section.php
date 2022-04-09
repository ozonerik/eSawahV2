<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_section extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $width, $order, $smallorder;
    public function __construct( $width, $order, $smallorder )
    {
        $this->width = $width;
        $this->order = $order;
        $this->smallorder = $smallorder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_section');
    }
}
