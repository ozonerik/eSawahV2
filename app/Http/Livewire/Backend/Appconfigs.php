<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Appconfig;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Appconfigs extends Component
{
    use LivewireAlert;
    public $hargapadi,$nilailanja;

    public function mount()
    {
        $config=Appconfig::find(1);

        $this->hargapadi= $config->hargapadi;
        $this->nilailanja= $config->nilailanja;
    }

    public function editreferensi(){
        $this->validate(
            [ 
                'hargapadi' => 'required',
                'nilailanja' => 'required',
            ]);
        
        $config=Appconfig::updateOrCreate(['id' => '1'], [
            'hargapadi' => $this->hargapadi,
            'nilailanja' => $this->nilailanja,
        ]);

        //flash message
        $this->alert('success', 'Referensi berhasil diupdate');
    }

    public function render()
    {
        return view('livewire.backend.appconfigs')->extends('layouts.app');
    }
}
