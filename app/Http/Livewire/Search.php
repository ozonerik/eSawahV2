<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search_txt;

    protected function getListeners()
    {
        $data = [
            'dashboard' => 'search_dashboard'
            ];
        return $data;
    }

    public function search_dashboard(){
        $this->emitTo('backend.dashboard', 'do_search', $this->search_txt);
        $this->search_txt = '';
    }

    public function render()
    {
        return view('livewire.search');
    }
}
