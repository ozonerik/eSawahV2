<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_info extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title, $message;
    
    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_info');
    }
}
