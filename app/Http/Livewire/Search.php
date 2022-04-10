<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $search_txt, $target_comp, $placeholder_comp;

    private function component_target(){
        switch ($this->target_comp) {
            case "dashboard":
                $this->emitTo('backend.dashboard', 'do_search', $this->search_txt);
                break;
            case "blue":
                echo "Your favorite color is blue!";
                break;
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
    }
    
    public function get_search(){     
        $this->component_target();
    }
    public function clearSearch(){     
        $this->search_txt = '';
        $this->component_target();
    }

    public function render()
    {
        return view('livewire.search');
    }
}
