<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Appconfig;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Manny;

class Appconfigs extends Component
{
    use LivewireAlert;
    public $mapapikey,$hargapadi,$nilailanja;

    public function mount()
    {
        $config=Appconfig::find(1);

        $this->mapapikey= $config->mapapikey;
        $this->hargapadi= get_floatttorp($config->hargapadi);
        $this->nilailanja= $config->nilailanja;
    }

    public function onReset(){
        $config=Appconfig::find(1);
        $this->mapapikey= $config->mapapikey;
        $this->hargapadi= get_floatttorp($config->hargapadi);
        $this->nilailanja= $config->nilailanja;
    }

    public function editreferensi(){
        $this->validate(
            [ 
                'mapapikey' => 'required',
                'hargapadi' => 'required',
                'nilailanja' => 'required',
            ]);
        
        $config=Appconfig::updateOrCreate(['id' => '1'], [
            'mapapikey' => $this->mapapikey,
            'hargapadi' => Manny::stripper($this->hargapadi,['num']),
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
