<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
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

    public function paids($enterprise_id)
    {
        $enterprise = Enterprise::find($enterprise_id);

        return view('paids', compact('enterprise'));
    }

    public function pay(Request $request, $enterprise_id)
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
    }
}
