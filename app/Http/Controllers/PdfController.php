<?php

namespace App\Http\Controllers;

use App\ExportData;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Project;
use App\Visit;
use App\Visitationnote;
use App\Member;

class PdfController extends Controller {


    /**
     * Exports visit data to pdf.
     *
     * @param Request $request
     */
    public function savePdfData(Request $request) {

        $reportID = $request->json("idString");

        $visitID = $request->json("visitID");
        $visit = Visit::where('id', '=', $visitID)->first();

        $projectID = $request->json("projectID");
        $project = Project::where('id', '=', $projectID)->first();

        $data = [
            'visitTitle' => $visit->title,
            'visitDate' => $visit->date,
            'projectNumber' => $project->number,
            'projectName' => $project->name,
        ];

        $exportData = new ExportData();
        $exportData->idString = $reportID;
        $exportData->data = json_encode($data);
        $exportData->save();
    }

    public function index($idString){

        $exportData = ExportData::where('idString', '=', $idString)->first();

        $visitTitle = json_decode($exportData->data)->visitTitle;
        $visitDate = json_decode($exportData->data)->visitDate;
        $projectNumber = json_decode($exportData->data)->projectNumber;
        $projectName = json_decode($exportData->data)->projectName;

        // usersPdf is the view that includes the downloading content
        $view = \View::make('PdfDemo', [
            'visitTitle'=>$visitTitle,
            'visitDate'=>$visitDate,
            'projectNumber'=>$projectNumber,
            'projectName'=>$projectName,
            ]);
        $html_content = $view->render();
        // Set title in the PDF
        PDF::SetTitle("Begehung: " . $visitTitle . ", " . $visitDate);
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');
        // userlist is the name of the PDF downloading
        PDF::Output('begehungsbericht_' . $visitDate . '.pdf');

        ExportData::where('idString', '=', $reportID)->delete();

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


