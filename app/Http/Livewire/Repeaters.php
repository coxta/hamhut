<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Repeaters extends Component
{

    public function mount()
    {
        // session()->flash('alert', 'Hello');
    }

    public function render()
    {
        return view('livewire.repeaters');
    }
}
