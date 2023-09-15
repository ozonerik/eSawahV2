<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_table extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $width, $title, $data, $thead, $tbody, $tbtn;

    public function __construct($width, $title, $data, $thead, $tbody,$tbtn)
    {
        $this->width = $width;
        $this->title = $title;
        $this->data = $data;
        $this->thead = $thead;
        $this->tbody = $tbody;
        $this->tbtn = $tbtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_table');
    }
}
