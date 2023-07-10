<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

use App\Models\PersonalDataActivity;
use App\Models\PersonalDataUse;
use App\Models\Sector;

class PreRegisterForm extends Component
{
    public $categories, $sectors, $activities, $uses;
    public $category_id, $sector_id , $personal_data_use_id, $personal_data_activity_id;
    public $catSelected;
    public $thirdPartyEmployees, $candidateData, $supplierData, $customerData, $thirdPartyCustomerData, $employeeData;
    public $all;

    function mount()
    {
        $this->all = false;
        $this->sector_id = null;
        $this->personal_data_use_id = null;
        $this->personal_data_activity_id = null;

        $this->categories = Category::all();
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
            'category_id' => $this->category_id,

            'thirdPartyEmployees' => $this->thirdPartyEmployees,
            'candidateData' => $this->candidateData,
            'supplierData' => $this->supplierData,
            'customerData' => $this->customerData,
            'thirdPartyCustomerData' => $this->thirdPartyCustomerData,
            'employeeData' => $this->employeeData,
        ]);

        return redirect()->route('register');
    }

    function setCategory($category_id)
    {
        $this->category_id = $category_id;
        $this->catSelected = Category::find($category_id);

        $this->sectors = Sector::where('category_id', $category_id)->get();
        $this->activities = PersonalDataActivity::where('category_id', $category_id)->get();
        $this->uses = PersonalDataUse::where('category_id', $category_id)->get();
    }
}
