<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
            'paid' => false,
        ];

        array_push($this->enterprises, $enterprise);
    }

    public function loadEnterprises()
    {
        $this->enterprises = [];

        foreach (DB::table('user_enterprises')->where('user_id', auth()->user()->id)->get()->toArray() as $value) {
            array_push($this->enterprises, [
                'id' => $value->enterprise_id,
                'paid' => $value->paid
            ]);
        }
    }
}
