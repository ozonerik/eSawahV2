<?php

namespace App\View\Components;

use Illuminate\View\Component;

class carousel_info extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $data,$slideaktif;

    public function __construct($data,$slideaktif)
    {
        $this->data=$data;
        $this->slideaktif=$slideaktif;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel_info');
    }
}
