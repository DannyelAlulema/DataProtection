<?php

namespace Modules\Administration\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('administration::index');
    }

    public function getVoucher(Request $request)
    {
        $validated = $request->validate([
            'voucher_path' => 'required'
        ]);

        return Storage::disk('public')->download($validated['voucher_path']);
    }
}
