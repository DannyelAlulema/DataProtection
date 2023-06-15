<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\UserEnterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('administration');
        }

        $data = UserEnterprise::with('user', 'enterprise')
            ->where('user_id', auth()->user()->id)
        ->get();

        foreach ($data as $key => $value)
            $data[$key]->appointments = Appointment::where('user_enterprise_id', $value->id)->get()->toArray();

        return view('dashboard', compact('data'));
    }
}
