<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_chart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type, $width, $title, $idbarchart;
    
    public function __construct($type, $title, $width, $idbarchart)
    {
        $this->type = $type;
        $this->width = $width;
        $this->title = $title;
        $this->idbarchart = $idbarchart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_chart');
    }
}
