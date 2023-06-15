<?php

namespace App\Http\Livewire;

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
    public $bussines_name, $ci_ruc, $sector_id, $personal_data_use_id, $personal_data_activity_id, $email, $paid, $phone_number, $legal_representative;
    public $sectors, $activities, $uses;

    public function mount($enterpriseId, $userEnterpriseId)
    {
        $this->enterpriseId = $enterpriseId;
        $this->userEnterpriseId = $userEnterpriseId;

        if ($this->enterpriseId != 0) {
            $enterprise = Enterprise::find($this->enterpriseId);
            $userEnterprise = UserEnterprise::find($this->userEnterpriseId);

            $this->legal_representative = $enterprise->legal_representative;
            $this->bussines_name = $enterprise->bussines_name;
            $this->ci_ruc = $enterprise->ci_ruc;
            $this->phone_number = $enterprise->phone_number;
            $this->email = $enterprise->email;
            $this->sector_id = ($enterprise->sector_id == null) ? 0 : $enterprise->sector_id;
            $this->personal_data_use_id = ($enterprise->personal_data_use_id == null) ? 0 : $enterprise->personal_data_use_id;
            $this->personal_data_activity_id = ($enterprise->personal_data_activity_id == null) ? 0 : $enterprise->personal_data_activity_id;

            $this->paid = $userEnterprise->paid;
        }

        $this->sectors = Sector::all();
        $this->activities = PersonalDataActivity::all();
        $this->uses = PersonalDataUse::all();
    }

    public function render()
    {
        return view('livewire.enterprise-card');
    }

    public function save()
    {
        $rules = [
            'sector_id' => 'required|integer',
            'personal_data_use_id' => 'required|integer',
            'personal_data_activity_id' => 'required|integer',
            'bussines_name' => 'required|max:100',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|max:10',
            'legal_representative' => 'required|max:50',
        ];
        $rules['ci_ruc'] = ($this->enterpriseId == 0) ? 'required|max:13|min:10|unique:enterprises,ci_ruc' : 'required|max:13|min:10';

        $validated = $this->validate($rules);

        if (!$this->validCi($validated['ci_ruc'])) {
            session([
                'enterprise-message' => 'Cedula o RUC invalido.',
                'type' => 'red',
            ]);
            return;
        }

        $validated['sector_id'] = ($validated['sector_id'] == 0) ? null : $validated['sector_id'];
        $validated['personal_data_use_id'] = ($validated['personal_data_use_id'] == 0) ? null : $validated['personal_data_use_id'];
        $validated['personal_data_activity_id'] = ($validated['personal_data_activity_id'] == 0) ? null : $validated['personal_data_activity_id'];

        if ($this->enterpriseId == 0) {
            $enterprise = Enterprise::create($validated);
            $enterprise->created_by = auth()->user()->id;

            auth()->user()->enterprises()->attach($enterprise->id);

            DB::table('user_enterprises')
                ->where('enterprise_id', $enterprise->id)
                ->where('user_id', auth()->user()->id)
            ->update(['paid' => false]);
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

        session([
            'enterprise-saved-message' => 'Cambios guardados satisfactoriamente.',
            'type' => 'green',
        ]);

        $this->emit('enterpriseSaved');
    }
}
