<?php

namespace App\Http\Controllers;

use App\Models\UserEnterprise;
use App\Traits\NumberConverter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class FileController extends Controller
{
    use NumberConverter;

    public function download($document, $user_enterprise_id)
    {
        if (!$data = UserEnterprise::with('user', 'enterprise.dataUse', 'enterprise.dataActivity', 'enterprise.sector')->find($user_enterprise_id)->toArray())
            abort(404);

        if (!$data['paid'])
            abort(404);

        if (((int) $document) > 4)
            abort(404);

        $file = Str::lower('pdf.'.$this->numberToWord($document));
        $pdf = Pdf::loadView($file, compact('data'));

        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('doc.pdf');
    }
}
