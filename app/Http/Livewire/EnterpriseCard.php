<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Enterprise;
use App\Models\PersonalDataActivity;
use App\Models\PersonalDataUse;
use App\Models\Sector;
use App\Models\UserEnterprise;
use App\Traits\DocumentValidation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EnterpriseCard extends Component
{
    use DocumentValidation;

    public $enterpriseId, $userEnterpriseId;
    public $address, $bussines_name, $description, $ci_ruc;
    public $category_id ,$sector_id, $personal_data_use_id, $personal_data_activity_id;
    public $email, $paid, $phone_number, $legal_representative, $legal_representative_ci, $legal_representative_phone, $legal_representative_email;
    public $thirdPartyEmployees, $candidateData, $supplierData, $customerData, $thirdPartyCustomerData, $employeeData;
    public $categories, $sectors, $activities, $uses, $catSelected;

    public function mount($enterpriseId, $userEnterpriseId)
    {
        $this->enterpriseId = $enterpriseId;
        $this->userEnterpriseId = $userEnterpriseId;

        if ($this->enterpriseId != 0) {
            $enterprise = Enterprise::find($this->enterpriseId);
            $userEnterprise = UserEnterprise::find($this->userEnterpriseId);

            $this->legal_representative = $enterprise->legal_representative;
            $this->legal_representative_ci = $enterprise->legal_representative_ci;
            $this->legal_representative_phone = $enterprise->legal_representative_phone;
            $this->legal_representative_email = $enterprise->legal_representative_email;

            $this->address = $enterprise->address;
            $this->bussines_name = $enterprise->bussines_name;
            $this->description = $enterprise->description;
            $this->ci_ruc = $enterprise->ci_ruc;
            $this->phone_number = $enterprise->phone_number;
            $this->email = $enterprise->email;
            $this->category_id = ($enterprise->category_id == null) ? 0 : $enterprise->category_id;
            $this->sector_id = ($enterprise->sector_id == null) ? 0 : $enterprise->sector_id;
            $this->personal_data_use_id = ($enterprise->personal_data_use_id == null) ? 0 : $enterprise->personal_data_use_id;
            $this->personal_data_activity_id = ($enterprise->personal_data_activity_id == null) ? 0 : $enterprise->personal_data_activity_id;

            $this->thirdPartyEmployees = $enterprise->thirdPartyEmployees;
            $this->candidateData = $enterprise->thirdPartyEmployees;
            $this->supplierData = $enterprise->thirdPartyEmployees;
            $this->customerData = $enterprise->thirdPartyEmployees;
            $this->thirdPartyCustomerData = $enterprise->thirdPartyEmployees;
            $this->employeeData = $enterprise->thirdPartyEmployees;

            $this->paid = $userEnterprise->paid;
        } else {
            $this->category_id = (session('category_id')) ?? session('category_id');
            $this->sector_id = (session('sector_id')) ?? session('sector_id');
            $this->personal_data_use_id = (session('personal_data_use_id')) ?? session('personal_data_use_id');
            $this->personal_data_activity_id = (session('personal_data_activity_id')) ?? session('personal_data_activity_id');
        }

        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.enterprise-card');
    }

    public function save()
    {
        $new = false;

        $rules = [
            'category_id' => 'required|integer',
            'sector_id' => 'required|integer',
            'personal_data_use_id' => 'required|integer',
            'personal_data_activity_id' => 'required|integer',
            'address' => 'required|max:255',
            'bussines_name' => 'required|max:100',
            'description' => 'required|max:255',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|max:10',
            'legal_representative' => 'required|max:50',
            'legal_representative_ci' => 'required|max:10',
            //'legal_representative_phone' => 'required|max:10',
            //'legal_representative_email' => 'required|max:50',
            'thirdPartyEmployees' => 'min:0|max:1|integer',
            'candidateData' => 'min:0|max:1|integer',
            'supplierData' => 'min:0|max:1|integer',
            'customerData' => 'min:0|max:1|integer',
            'thirdPartyCustomerData' => 'min:0|max:1|integer',
            'employeeData' => 'min:0|max:1|integer'
        ];
        $rules['ci_ruc'] = ($this->enterpriseId == 0) ? 'required|max:13|min:10|unique:enterprises,ci_ruc' : 'required|max:13|min:10';

        $validated = $this->validate($rules);

        if (!$this->validCi($validated['ci_ruc'])) {
            session([
                'enterprise-message' => 'RUC de la empresa invalido.',
                'type' => 'red',
            ]);
            return;
        }

        if (!$this->validCi($validated['ci_ruc'])) {
            session([
                'enterprise-message' => 'Numero de cédula del representante invalido.',
                'type' => 'red',
            ]);
            return;
        }

        $validated['sector_id'] = ($validated['sector_id'] == 0) ? null : $validated['sector_id'];
        $validated['personal_data_use_id'] = ($validated['personal_data_use_id'] == 0) ? null : $validated['personal_data_use_id'];
        $validated['personal_data_activity_id'] = ($validated['personal_data_activity_id'] == 0) ? null : $validated['personal_data_activity_id'];

        $validated['legal_representative_phone'] = $validated['phone_number'];
        $validated['legal_representative_email'] = $validated['email'];

        if ($this->enterpriseId == 0) {
            $enterprise = Enterprise::create($validated);
            $enterprise->created_by = auth()->user()->id;

            auth()->user()->enterprises()->attach($enterprise->id);

            DB::table('user_enterprises')
                ->where('enterprise_id', $enterprise->id)
                ->where('user_id', auth()->user()->id)
                ->update(['paid' => false]);

            $new = true;
            session()->forget(['category_id', 'sector_id', 'personal_data_use_id', 'personal_data_activity_id']);
        } else {
            $enterprise = Enterprise::findOrFail($this->enterpriseId);
            $enterprise->fill($validated);
            if ($enterprise->isClean()) {
                session([
                    'enterprise-message' => 'Por lo menos un valor debe cambiar.',
                    'type' => 'red',
                ]);
                return;
            }
        }

        $enterprise->updated_by = auth()->user()->id;
        $enterprise->save();

        $message = $new
            ? '<p>Empresa registrada exitosamente, por favor verificar si todos los datos son correctos antes de avanzar en el siguiente paso.</p>'
            : '<p>Datos actualizados exitosamente, por favor verificar si todos los datos son correctos antes de avanzar en el siguiente paso.</p>';
        $message .= '<p><a style="text-decoration: underline;" href="' . route('dashboard') . '">Si los datos son correctos da click aquí </a>caso contrario actualiza los datos</p>';

        session([
            'enterprise-saved-message' => $message,
            'type' => 'green',
        ]);

        $this->emit('enterpriseSaved');
    }

    function setCategory()
    {
        if ($this->category_id != null && $this->category_id != 0) {
            $this->catSelected = Category::find($this->category_id);

            $this->sectors = Sector::where('category_id', $this->category_id)->get();
            $this->activities = PersonalDataActivity::where('category_id', $this->category_id)->get();
            $this->uses = PersonalDataUse::where('category_id', $this->category_id)->get();
        }
    }
}
