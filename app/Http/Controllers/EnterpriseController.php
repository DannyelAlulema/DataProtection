<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enterprise;
use App\Models\PayRequest;
use App\Models\UserEnterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('enterprises');
    }

    public function pay($user_enterprise_id)
    {
        $userEnterprise = UserEnterprise::with('enterprise')->find($user_enterprise_id);

        if ($userEnterprise->toArray()['paid'])
            abort(404);

        $payRequests = PayRequest::with('state')
            ->whereRelation('state', 'code', 1)
            ->where('user_enterprise_id', $user_enterprise_id)
            ->get()
            ->toArray();

        return view('pays', compact('userEnterprise', 'payRequests'));
    }

    /*public function pay(Request $request, $enterprise_id)
    {
        $request->validate([
            'card' => 'required',
            'expiration' => 'required',
            'cvv' => 'required'
        ]);

        DB::table('user_enterprises')
            ->where('enterprise_id', $enterprise_id)
            ->where('user_id', auth()->user()->id)
        ->update(['paid' => true]);

        return redirect()->route('dashboard');
    }*/

    function generate()
    {
        if (!session('pre-register'))
            abort(404);

        $data = [];

        $data['category_id'] = (session('category_id')) ?? session('category_id');
        $catSelected = Category::find($data['category_id']);
        if ($catSelected->code == 1) {
            $data['sector_id'] = (session('sector_id')) ? session('sector_id') : null;
            $data['personal_data_use_id'] = (session('personal_data_use_id')) ? session('personal_data_use_id') : null;
            $data['personal_data_activity_id'] = (session('personal_data_activity_id')) ? session('personal_data_activity_id') : null;

            $data['description'] = (session('description')) ?? session('description');
            $data['legal_representative'] = (session('legal_representative')) ?? session('legal_representative');
            $data['legal_representative_ci'] = (session('legal_representative_ci')) ?? session('legal_representative_ci');

            $data['thirdPartyEmployees'] = (session('thirdPartyEmployees')) ?? session('thirdPartyEmployees');
            $data['candidateData'] = (session('candidateData')) ?? session('candidateData');
            $data['supplierData'] = (session('supplierData')) ?? session('supplierData');
            $data['customerData'] = (session('customerData')) ?? session('customerData');
            $data['thirdPartyCustomerData'] = (session('thirdPartyCustomerData')) ?? session('thirdPartyCustomerData');
            $data['employeeData'] = (session('employeeData')) ?? session('employeeData');
        } elseif ($catSelected->code == 2) {
            $data['medic_dependence'] = (session('medic_dependence')) ?? session('medic_dependence');
            $data['medic_data_porpose_id'] = (session('medic_data_porpose_id')) ?? session('medic_data_porpose_id');
        }

        $data['address'] = (session('address')) ?? session('address');
        $data['bussines_name'] = (session('bussines_name')) ?? session('bussines_name');
        $data['ci_ruc'] = (session('ci_ruc')) ?? session('ci_ruc');
        $data['email'] = (session('email')) ?? session('email');
        $data['phone_number'] = (session('phone_number')) ?? session('phone_number');

        $enterprise = Enterprise::create($data);

        $enterprise->created_by = auth()->user()->id;
        $enterprise->updated_by = auth()->user()->id;
        $enterprise->save();

        auth()->user()->enterprises()->attach($enterprise->id);

        DB::table('user_enterprises')
            ->where('enterprise_id', $enterprise->id)
            ->where('user_id', auth()->user()->id)
            ->update(['paid' => false]);

        return redirect()->back();
    }
}
