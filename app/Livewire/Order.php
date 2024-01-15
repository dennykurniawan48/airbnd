<?php

namespace App\Livewire;

use App\Models\BookingDate;
use Livewire\Component;

class Order extends Component
{
    public $orders;

    public function mount(){
        $this->orders = BookingDate::all();
    }
    public function render()
    {
        return view('livewire.order');
    }
}
