<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\PersonalDataActivity;
use App\Models\PersonalDataUse;
use App\Models\Sector;

class PreRegisterForm extends Component
{
    public $sectors, $activities, $uses;
    public $sector_id , $personal_data_use_id, $personal_data_activity_id;
    public $all;

    function mount()
    {
        $this->all = false;
        $this->sector_id = null;
        $this->personal_data_use_id = null;
        $this->personal_data_activity_id = null;

        $this->sectors = Sector::all();
        $this->activities = PersonalDataActivity::all();
        $this->uses = PersonalDataUse::all();
    }

    public function render()
    {
        return view('livewire.pre-register-form');
    }

    function verifySelected()
    {
        if ($this->sector_id != null && $this->personal_data_use_id != null && $this->personal_data_activity_id != null)
        {
            $this->all = true;
            if ($this->sector_id == 0 && $this->personal_data_use_id == 0 && $this->personal_data_activity_id == 0)
                $message = '¡Su empresa ya puede acceder a la ley de protección de datos! Solo complete el registro.';
            else
                $message = '¡Su empresa necesita una asesoría personalizada! Para agendarla complete el registro.';

            session([
                'message' => $message,
                'type' => 'success'
            ]);
        }
    }

    function confirmRegister()
    {
        session([
            'sector_id' => $this->sector_id,
            'personal_data_use_id' => $this->personal_data_use_id,
            'personal_data_activity_id' => $this->personal_data_activity_id,
        ]);

        return redirect()->route('register');
    }
}
