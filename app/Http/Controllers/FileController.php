<?php

namespace App\Http\Controllers;

use App\Models\UserEnterprise;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function download($document, $user_enterprise_id)
    {
        if (!$data = UserEnterprise::with('user', 'enterprise')->find($user_enterprise_id)->toArray())
            abort(404);

        if (!$data['paid'])
            abort(404);

        if ($document == 1)
            $path = public_path('files/one.pdf');
        elseif ($document == 2)
            $path = public_path('files/two.pdf');
        elseif ($document == 3)
            $path = public_path('files/three.pdf');
        elseif ($document == 4)
            $path = public_path('files/four.pdf');

        if (file_exists($path))
            return response()->download($path);

        return abort(404);

        /*if ($document == 1)
            $pdf = Pdf::loadView('pdf.one', $data);
        elseif ($document == 2)
            $pdf = Pdf::loadView('pdf.two', $data);
        elseif ($document == 3)
            $pdf = Pdf::loadView('pdf.three', $data);
        elseif ($document == 4)
            $pdf = Pdf::loadView('pdf.four', $data);
        else
            abort(404);

        return $pdf->download('invoice.pdf');*/
    }
}
