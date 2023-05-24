<?php

namespace App\Http\Livewire;

use App\Models\PersonalDataActivity;
use App\Models\PersonalDataUse;
use App\Models\Sector;
use Livewire\Component;

class EnterpriseCard extends Component
{
    public $bussinesName, $ruc;

    public $sectors, $activities, $uses;

    public function mount()
    {
        $this->sectors = Sector::all();
        $this->activities = PersonalDataActivity::all();
        $this->uses = PersonalDataUse::all();
    }

    public function render()
    {
        return view('livewire.enterprise-card');
    }
}
