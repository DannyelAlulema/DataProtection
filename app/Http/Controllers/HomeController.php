<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $enterprises = DB::table('user_enterprises')
            ->where('user_id', auth()->user()->id)
            ->join('enterprises', 'user_enterprises.enterprise_id', 'enterprises.id')
        ->get()->toArray();

        return view('dashboard', compact('enterprises'));
    }
}
