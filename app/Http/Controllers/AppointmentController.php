<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentState;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with('state', 'userEnterprise.user', 'userEnterprise.enterprise')->get();
        return view('administration::appointments.index', compact('appointments'));
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
            'date' => 'required|date',
            'start_at' => 'required',
            'end_at' => 'required'
        ]);

        $state = AppointmentState::where('code', 1)->first();
        $validated['appointment_state_id'] = $state->id;

        Appointment::create($validated);

        return redirect()->back()->with([ 'message' => 'Cita registrada satisfactoriamente', 'type' => 'indigo' ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
