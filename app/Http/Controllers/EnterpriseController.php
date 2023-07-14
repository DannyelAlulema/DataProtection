<?php

namespace App\Http\Controllers;

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
}
