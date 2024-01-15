<?php

namespace App\Livewire\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class LoginModal extends ModalComponent
{
    public function close(){
        $this->closeModal();
    }
    
    public function render()
    {
        return view('livewire.modal.login-modal');
    }
}
