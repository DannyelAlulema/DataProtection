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
    public $address, $bussines_name, $description, $ci_ruc, $sector_id, $personal_data_use_id, $personal_data_activity_id, $email, $paid, $phone_number, $legal_representative, $legal_representative_ci, $legal_representative_phone, $legal_representative_email;
    public $sectors, $activities, $uses;

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
            $this->sector_id = ($enterprise->sector_id == null) ? 0 : $enterprise->sector_id;
            $this->personal_data_use_id = ($enterprise->personal_data_use_id == null) ? 0 : $enterprise->personal_data_use_id;
            $this->personal_data_activity_id = ($enterprise->personal_data_activity_id == null) ? 0 : $enterprise->personal_data_activity_id;

            $this->paid = $userEnterprise->paid;
        } else {
            $this->sector_id = (session('sector_id')) ? session('sector_id') : null;
            $this->personal_data_use_id = (session('personal_data_use_id')) ? session('personal_data_use_id') : null;
            $this->personal_data_activity_id = (session('personal_data_activity_id')) ? session('personal_data_activity_id') : null;

            session()->forget(['sector_id', 'personal_data_use_id', 'personal_data_activity_id']);
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
        $new = false;

        $rules = [
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
        $message .= '<p><a style="text-decoration: underline;" href="'.route('dashboard').'">Si los datos son correctos da click aquí </a>caso contrario actualiza los datos</p>';

        session([
            'enterprise-saved-message' => $message,
            'type' => 'green',
        ]);

        $this->emit('enterpriseSaved');
    }
}
