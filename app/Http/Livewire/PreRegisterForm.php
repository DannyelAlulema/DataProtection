<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\MedicDataPorpose;
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
    public $medicDataPorposes, $medic_dependence, $medic_data_porpose_id;
    public $all;

    function mount()
    {
        $this->all = false;
        $this->sector_id = null;
        $this->personal_data_use_id = null;
        $this->personal_data_activity_id = null;

        $this->categories = Category::all();
        $this->medicDataPorposes = MedicDataPorpose::all();
    }

    public function render()
    {
        return view('livewire.pre-register-form');
    }

    function verifySelected()
    {
        $message = '';
        if ($this->catSelected->code == 1) {
            if ($this->sector_id != null && $this->personal_data_use_id != null && $this->personal_data_activity_id != null)
            {
                $this->all = true;
                if ($this->sector_id == 0 && $this->personal_data_use_id == 0 && $this->personal_data_activity_id == 0)
                    $message = '¡Su empresa ya puede acceder a la ley de protección de datos! Solo complete el registro.';
                elseif ($this->sector_id != 0 || $this->personal_data_use_id != 0 || $this->personal_data_activity_id != 0)
                    $message = '¡Su empresa necesita una asesoría personalizada! Para agendarla complete el registro.';

                session([
                    'message' => $message,
                    'type' => 'success'
                ]);
            }
        } elseif ($this->catSelected->code == 2) {
            if ($this->medic_dependence != null) {
                if ((bool) $this->medic_dependence) {
                    $message = 'Lastimosamente esta herramienta no es para ti.';
                } else {
                    if ($this->medic_data_porpose_id != null) {
                        $porpose = MedicDataPorpose::find($this->medic_data_porpose_id);
                        if ($porpose->code == 3) {
                            $this->all = false;
                            $message = 'Lastimosamente esta herramienta no es para ti.';
                        } else {
                            $this->all = true;
                            $message = '¡Su empresa ya puede acceder a la ley de protección de datos! Solo complete el registro.';
                        }
                    }
                }

                session([
                    'message' => $message,
                    'type' => 'success'
                ]);
            }
        }
    }

    function confirmRegister()
    {
        $auxArr = ($this->catSelected->code == 1) ? [
            'category_id' => $this->category_id,

            'sector_id' => $this->sector_id,
            'personal_data_use_id' => $this->personal_data_use_id,
            'personal_data_activity_id' => $this->personal_data_activity_id,

            'thirdPartyEmployees' => $this->thirdPartyEmployees,
            'candidateData' => $this->candidateData,
            'supplierData' => $this->supplierData,
            'customerData' => $this->customerData,
            'thirdPartyCustomerData' => $this->thirdPartyCustomerData,
            'employeeData' => $this->employeeData,
        ] : [
            'category_id' => $this->category_id,

            'medic_dependence' => $this->medic_dependence,
            'medic_data_porpose_id' => $this->medic_data_porpose_id
        ];

        $auxArr['pre-register'] = true;
        session($auxArr);

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
