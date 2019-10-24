<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller {

    public function index(){

        PDF::SetTitle('Hello World');

        PDF::AddPage();

        PDF::Write(0, 'Hello World');

        PDF::Output('hello_world.pdf');
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


