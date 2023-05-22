<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public $name, $ruc, $email, $password, $password_confirmation;
    public $serviceType, $enterpriseType;

    public function render()
    {
        return view('livewire.register-form');
    }

    public function validateTypes()
    {
        if ($this->serviceType == 'NA' && $this->enterpriseType == 'NA') {
            session([
                'register-message' => 'Su empresa requiere una asesoría personalizada, termine el registro y agende la misma.',
                'type' => 'info',
            ]);
            return;
        }
    }
}
