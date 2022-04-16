<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search_txt;

    public function clearSearch(){
        $this->search_txt='';
    }
    
    public function get_search(){      
        return redirect()->to('/result?s='.$this->search_txt); 
    }

    public function render()
    {
        return view('livewire.search');
    }
}
