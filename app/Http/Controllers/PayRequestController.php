<?php

namespace App\Http\Controllers;

use App\Models\PayRequest;
use App\Models\PayRequestState;
use App\Models\UserEnterprise;
use Illuminate\Http\Request;

class PayRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payRequests = PayRequest::with('state', 'userEnterprise.user', 'userEnterprise.enterprise')
            ->whereRelation('state', 'code', 1)
            ->get()
        ->toArray();

        return view('administration::pays.requests.index', compact('payRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_enterprise_id' => 'required',
            'voucher' => 'required|file|mimes:jpeg,jpg,png,pdf',
        ]);

        unset($validated['voucher']);
        $voucher = $request->file('voucher');
        $validated['voucher_path'] = $voucher->store('vouchers', 'public');

        $state = PayRequestState::where('code', 1)->first();
        $validated['pay_request_state_id'] = $state->id;

        PayRequest::create($validated);

        return redirect()->route('dashboard')->with([
            'message' => 'Gracias por tu pago, por seguridad lo validaremos en un plazo máximo de 24 horas, una vez revisado y aprobado recibirás un aviso vía correo electrónico, caso contrario, un asesor se contactará contigo con los números de telefónicos proporcionados.',
            'type' => 'indigo'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'approved' => 'required|boolean'
        ]);

        $payRequest = PayRequest::find($id);

        if ($request->approved)
            $state = PayRequestState::where('code', 2)->first();
        else
            $state = PayRequestState::where('code', 3)->first();

        $userEnterprise = UserEnterprise::find($payRequest->user_enterprise_id);
        $userEnterprise->paid = $request->approved;
        $userEnterprise->save();

        $payRequest->pay_request_state_id = $state->id;
        $payRequest->save();

        $message = 'La solicitud fue ';
        $message .= ($request->approved) ? 'aprobada' : 'rechazada';
        return redirect()->back()->with([ 'message' => $message, 'type' => 'success' ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
