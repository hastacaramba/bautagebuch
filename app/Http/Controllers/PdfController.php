<?php

namespace App\Http\Controllers;

use App\ExportData;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Project;

class PdfController extends Controller {


    public function savePdfData(Request $request) {
        $idString = $request->json("id");
        $name = $request->json("name");
        $number = $request->json("number");

        $data = [
            'name' => $name,
            'number' => $number
        ];

        $exportData = new ExportData();
        $exportData->idString = $idString;
        $exportData->data = json_encode($data);
        $exportData->save();
    }

    public function index($idString){

        $exportData = ExportData::where('idString', '=', $idString)->first();

        $number = json_decode($exportData->data)->number;
        $name = json_decode($exportData->data)->name;

        // usersPdf is the view that includes the downloading content
        $view = \View::make('PdfDemo', [
            'name'=>$name,
            'number'=>$number,
            ]);
        $html_content = $view->render();
        // Set title in the PDF
        PDF::SetTitle("List of users");
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        // userlist is the name of the PDF downloading
        PDF::Output('userlist.pdf');

        ExportData::where('idString', '=', $idString)->delete();

    }

    public function samplePDF() {
        $html_content = '<h1>Generate a PDF using TCPDF in laravel </h1>
        		<h4>by<br/>Learn Infinity</h4>';


        PDF::SetTitle('mebis DEMO Accountrief');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output('mebis-DEMO-Accountbrief.pdf');
    }

    public function savePDF() {

        $allData = Auth::user()->getDatenAccountVerwaltung();

        $data = "<h1>mebis Accountbrief</h1><br><br>mebis Zugangsdaten für " . $allData['vorname'] . " " . $allData['nachname'] . ":<br><br>Benutzername: " . $allData['benutzername'] . "<br><br>Passwort: " . $allData['passwort'];

        $html_content = $data;


        PDF::SetTitle('mebis Nutzerverwaltung');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(storage_path('app/tmp_accountdata/'.uniqid().'-'.$allData['benutzername'].'-mebis-DEMO-Accountbrief.pdf'), 'F');
        $pdf->Output('example_001.pdf', 'I');
    }

    public function downloadPDF() {

        //$allData = Auth::user()->getDatenAccountVerwaltung();

        $data = "test";

        $html_content = $data;


        PDF::SetTitle('mebis Nutzerverwaltung');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(uniqid().'mebis-DEMO-Accountbrief.pdf', 'D');
    }


    public function HtmlToPDF() {
        $view = \View::make('HtmlToPDF');
        $html_content = $view->render();


        PDF::SetTitle('mebis IDM DEMO-PDF');
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        PDF::Output(uniqid().'mebis-DEMO-Accountbrief.pdf');
    }
}


