<?php

namespace App\View\Components;

use Illuminate\View\Component;

class get_gmapsadress extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $eventname,$emitname,$inputname,$mapname,$kordinatname;
    public function __construct($eventname,$emitname,$inputname,$mapname,$kordinatname)
    {
        $this->eventname = $eventname;
        $this->emitname = $emitname;
        $this->inputname = $inputname;
        $this->mapname = $mapname;
        $this->kordinatname = $kordinatname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.get_gmapsadress');
    }
}
