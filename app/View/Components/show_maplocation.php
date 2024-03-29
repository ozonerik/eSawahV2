<?php

namespace App\View\Components;

use Illuminate\View\Component;

class show_maplocation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $eventname, $mapname, $emitname;
    public function __construct($eventname, $mapname, $emitname)
    {
        $this->eventname = $eventname;
        $this->mapname = $mapname;
        $this->emitname = $emitname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show_maplocation');
    }
}
