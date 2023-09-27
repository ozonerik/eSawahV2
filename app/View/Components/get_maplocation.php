<?php

namespace App\View\Components;

use Illuminate\View\Component;

class get_maplocation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $eventname,$emitname,$mapname;
    public function __construct($eventname,$emitname,$mapname)
    {
        $this->eventname = $eventname;
        $this->emitname = $emitname;
        $this->mapname = $mapname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.get_maplocation');
    }
}
