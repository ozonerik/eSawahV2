<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card_listitem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $photo, $link, $title, $value, $desc;

    public function __construct($photo, $link, $title, $value, $desc)
    {
        $this->photo = $photo; 
        $this->link = $link;
        $this->title = $title;
        $this->value = $value; 
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card_listitem');
    }
}
