<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Media;
use App\Pdf;

class PdfMediaController extends Controller
{
    /**
     * Delete the pdf with the given id.
     *
     * @param $pdfID The id of the pdf
     */
    public function deletePdf($pdfID) {
        $pdf = Pdf::where('id', '=', $pdfID)->first();

        if ($pdf != null) {
            $pdf->delete();
        }
    }


    /**
     * Edit the info of the pdf with the given id.
     *
     * @param Request $request
     * @param $pdfID
     */
    public function editPdf(Request $request, $pdfID) {
        $pdf = Pdf::where('id', $pdfID)->first();

        if ($pdf != null) {
            $pdf->info = $request->info;
            $pdf->save();
        }
    }


}
