<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Image;
use Pdf;

class PdfUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfUpload()
    {
        return view('pdfUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfUploadPost(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:900240',
        ]);

        $pdf = $request->file('pdf');

        $pdfName = $request->pdf->filename().time().'.'.$request->pdf->extension();

        $destinationPath = public_path('images');

        $pdf->save($destinationPath.'/'.$pdfName);

        return $pdfName;
    }



    /**
     * @param Request $request
     * @return string
     */
    public function pdfUploadPostVisit(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:900240',
        ]);

        $pdf = $request->file('pdf');

        $pdfName = $request->pdf->filename().time().'.'.$request->pdf->extension();

        $destinationPath = public_path('images');

        $pdf->save($destinationPath.'/'.$pdfName);

        $visitID = $request->visitID;

        $info = $request->info;

        $pdf = new Pdf();
        $pdf->filename = $pdfName;
        $pdf->info = $info;
        $pdf->visit_id = $visitID;
        $pdf->save();

        return $pdfName;

    }


    /**
     * @param Request $request
     * @return string
     */
    public function pdfUploadPostEditedVisit(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:900240',
        ]);

        $pdf = $request->file('pdf');

        $pdfName = $request->pdf->filename().time().'.'.$request->pdf->extension();

        $destinationPath = public_path('images');

        $pdf->save($destinationPath.'/'.$pdfName);

        $pdfID = $request->pdfID;

        $info = $request->info;

        $pdf = Pdf::where('id', $pdfID)->first();
        $pdf->filename = $pdfName;
        $pdf->info = $info;
        $pdf->save();

        return $pdfName;

    }

}