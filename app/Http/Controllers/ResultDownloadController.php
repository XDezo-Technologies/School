<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\models\results;
use Illuminate\Support\Facades\View;

class ResultDownloadController extends Controller
{
    public function download($format)
    {
        if ($format === 'pdf') {
            $pdf = new Dompdf();
            $results = Results::all();
            $pdf->loadHtml(View::make('school.results.pdf', ['results' => $results])->render());
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            return $pdf->stream('school.results.pdf');
        }
    }
}
