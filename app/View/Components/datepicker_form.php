<?php

namespace App\View\Components;

use Illuminate\View\Component;

class datepicker_form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ids, $name, $placeholder, $label, $disabled, $wajib, $formatdate;

    public function __construct($ids, $name, $placeholder, $label, $disabled, $wajib, $formatdate)
    {
        $this->ids = $ids;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->disabled = $disabled;
        $this->wajib = $wajib;
        $this->formatdate = $formatdate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datepicker_form');
    }
}
