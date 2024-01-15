<?php

namespace App\Livewire\Components;

use App\Models\Country;
use Livewire\Component;

class Header extends Component
{
    public $countries = [];

    public $adult = 1;

    public $children = 0;

    public function mount(){
        $this->countries = Country::all();
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
