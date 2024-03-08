<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Appconfig;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Manny;

class Appconfigs extends Component
{
    use LivewireAlert;
    public $mapapikey,$hargapadi,$nilailanja,$hargaemas,$hargabata;

    public function mount()
    {
        $config=Appconfig::find(1);
        $this->mapapikey= $config->mapapikey;
        $this->hargapadi= get_floatttorp($config->hargapadi);
        $this->nilailanja= $config->nilailanja;
        $this->hargaemas=get_floatttorp(get_hargaemas());
        $this->hargabata=get_floatttorp($config->hargabata);
    }

    public function onReset(){
        $config=Appconfig::find(1);
        $this->mapapikey= $config->mapapikey;
        $this->hargapadi= get_floatttorp($config->hargapadi);
        $this->nilailanja= $config->nilailanja;
        $this->hargaemas=get_floatttorp(get_hargaemas());
        $this->hargabata=get_floatttorp($config->hargabata);
    }

    public function editreferensi(){
        $this->validate(
            [ 
                'mapapikey' => 'required',
                'hargapadi' => 'required',
                'nilailanja' => 'required',
                'hargabata' => 'required',
            ]);
        
        $config=Appconfig::updateOrCreate(['id' => '1'], [
            'mapapikey' => $this->mapapikey,
            'hargapadi' => Manny::stripper($this->hargapadi,['num']),
            'nilailanja' => $this->nilailanja,
            'hargabata' => Manny::stripper($this->hargabata,['num']),
        ]);

        //flash message
        $this->alert('success', 'Referensi berhasil diupdate');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('run_maskcurrency');
        return view('livewire.backend.appconfigs')->extends('layouts.app');
    }
}
