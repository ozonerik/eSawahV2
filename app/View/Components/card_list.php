<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_list extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $width, $title;
    
    public function __construct($width, $title)
    {
        $this->width = $width;
        $this->title =  $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_list');
    }
}
