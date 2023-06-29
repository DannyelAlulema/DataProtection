<?php

namespace App\Http\Livewire;

use App\Models\UserEnterprise;
use Livewire\Component;

class EnterprisesContainer extends Component
{
    protected $listeners = [
        'enterpriseSaved' => 'loadEnterprises'
    ];

    public $enterprises = [];

    public function mount()
    {
        $this->loadEnterprises();
    }

    public function render()
    {
        return view('livewire.enterprises-container');
    }

    public function addEnterprise()
    {
        $enterprise = [
            'id' => 0,
            'enterprise_id' => 0
        ];

        array_push($this->enterprises, $enterprise);
    }

    public function loadEnterprises()
    {
        unset($this->enterprises);
        $this->enterprises = [];

        $this->enterprises = UserEnterprise::where('user_id', auth()->user()->id)->get()->toArray();

        if (count($this->enterprises) == 0)
            $this->addEnterprise();
    }
}
