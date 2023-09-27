<?php

namespace App\View\Components;

use Illuminate\View\Component;

class map_dashboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $map_id,$mapname,$data;
    public function __construct($mapid,$mapname,$data)
    {
        $this->mapid = $mapid;
        $this->mapname = $mapname;
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map_dashboard');
    }
}
