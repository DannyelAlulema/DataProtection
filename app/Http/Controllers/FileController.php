<?php

namespace App\Http\Controllers;

use App\Models\UserEnterprise;
use App\Traits\NumberConverter;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Str;

class FileController extends Controller
{
    use NumberConverter;

    public function download($document, $user_enterprise_id)
    {
        if (!$data = UserEnterprise::with('user', 'enterprise.dataUse', 'enterprise.dataActivity', 'enterprise.sector')->find($user_enterprise_id)->toArray())
            abort(404);

        if (((int) $document) > 4)
            abort(404);

        if (!($data['enterprise']['sector_id'] == null && $data['enterprise']['personal_data_use_id'] == null && $data['enterprise']['personal_data_activity_id'] == null))
            abort(404);

        $file = Str::lower('pdf.'.$this->numberToWord($document));
        $file .= (!$data['paid']) ? '-censured' : '';

        $pdf = Pdf::loadView($file, compact('data'));

        $pdf->setPaper('A4', 'portrait');

        $timestamp = Carbon::now()->format('Y-m-d_His');
        $fileName = $data['enterprise']['ci_ruc'].'_'.$timestamp.'.pdf';

        return $data['paid'] ? $pdf->download($fileName) : $pdf->stream($fileName);
    }
}
