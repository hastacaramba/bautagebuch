<?php

namespace App\Http\Controllers;

use App\ExportData;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Project;
use App\Visit;
use App\Media;
use App\Visitationnote;
use App\Member;
use App\Contact;
use App\Subarea;
use App\Report;

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

        $visit->description = $strText = str_replace("\n","<br />",$visit->description);
        $visit->save();

        $visit = Visit::where('id', '=', $visitID)->first();

        $projectID = $request->json("projectID");
        $project = Project::where('id', '=', $projectID)->first();

        //get the visit media
        $visitMedia = Media::where('visit_id', $visitID)->get();

        $numOfVisitMedia = sizeof($visitMedia);

        //all visits of the project
        $projectVisits = Visit::where('project_id', $projectID)->get();

        $visitationnotes = [];

        foreach($projectVisits as $projectVisit) {
            $visitVisitationnotes = Visitationnote::where('visit_id', $projectVisit->id)->get();
            foreach($visitVisitationnotes as $visitationnote) {
                $visitationnotes[] = $visitationnote;
            }
        }

        $visitationnotesWithMedia = [];

        foreach($visitationnotes as $visitationnote) {

            //get all members of the project
            $members = Member::where('project_id', '=', $visitationnote->visit->project_id)->get();

            $concernedMembers = [];

            //run through the members and decide if he was present during visit or not
            for ($n = 0; $n < sizeof($members); $n++) {
                $member = $members[$n];
                $membersVisitationnotes = $member->visitationnotes()->get();
                for ($i = 0; $i < sizeof($membersVisitationnotes); $i++) {
                    if ($membersVisitationnotes[$i]['id'] == $visitationnote->id ) {
                        $concernedMembers[] = $member;
                    }
                }
            }

            $concernedmembersData = [];

            for ($n = 0; $n < sizeof($members); $n++) {
                if (in_array($members[$n],$concernedMembers)) {
                    $concernedmembersData[] = [
                        "id" => $members[$n]->id,
                        "firstname" => $members[$n]->contact['firstname'],
                        "surname" => $members[$n]->contact['surname'],
                        "company" => $members[$n]->contact['company'],
                        "street" => $members[$n]->contact['street'],
                        "housenumber" => $members[$n]->contact['housenumber'],
                        "postcode" => $members[$n]->contact['postcode'],
                        "city" => $members[$n]->contact['city'],
                        "email" => $members[$n]->contact['email'],
                        "phone" => $members[$n]->contact['phone'],
                        "mobile" => $members[$n]->contact['mobile'],
                        "fax" => $members[$n]->contact['fax'],
                        "info" => $members[$n]->contact['info'],
                        "subarea" => $members[$n]->subarea['title'],
                    ];
                }
            }

            $media = $visitationnote->media()->get();

            $numOfRows = sizeof($media);

            $createdAt = date('d.m.Y', strtotime($visitationnote->created_at));

            $deadline = date('d.m.Y', strtotime($visitationnote->deadline));

            $item = [
                'id' => $visitationnote->id,
                'number' => $visitationnote->number,
                'createdAt' => $createdAt,
                'category' => $visitationnote->category,
                'notes' => $visitationnote->notes,
                'deadline' => $deadline,
                'done' => $visitationnote->done,
                'important' => $visitationnote->important,
                'media' => $media,
                'numOfRows' => $numOfRows,
                'concernedMembers' => $concernedmembersData
            ];

            $visitationnotesWithMedia[] = $item;
        }

        //present members...

        //get all members of the project
        $members = Member::where('project_id', '=', $projectID)->get();

        $presentMembers = [];

        //run through the members and decide if he was present during visit or not
        for ($n = 0; $n < sizeof($members); $n++) {
            $member = $members[$n];
            $membersVisits = $member->visits;
            for ($i = 0; $i < sizeof($membersVisits); $i++) {
                if ($membersVisits[$i]['id'] == $visitID) {
                    $presentMembers[] = $member;
                }
            }
        }

        //now we know the present members - we need certain attributes of them
        $presentMembersData = [];

        foreach($presentMembers as $presentMember) {

            $contact = $presentMember->contact;
            $subarea = $presentMember->subarea;

            $item = [
                'surname' => $contact->surname,
                'firstname' => $contact->firstname,
                'company' => $contact->company,
                'subarea' => $subarea->title
            ];

            $presentMembersData[] = $item;
        }


        $data = [
            'visit' => $visit,
            'project' => $project,
            'presentMembersData' => $presentMembersData,
            'visitationnotes' => $visitationnotesWithMedia,
            'visitMedia' => $visitMedia,
            'numOfVisitMedia' => $numOfVisitMedia
        ];

        $exportData = new ExportData();
        $exportData->idString = $reportID;
        $exportData->data = json_encode($data);
        $exportData->save();
    }

    public function index($idString){

        $exportData = ExportData::where('idString', '=', $idString)->first();

        $visit = json_decode($exportData->data, true)['visit'];

        $project = json_decode($exportData->data, true)['project'];

        $presentMembers = json_decode($exportData->data, true)['presentMembersData'];

        $visitationnotes = json_decode($exportData->data, true)['visitationnotes'];

        $visitMedia = json_decode($exportData->data, true)['visitMedia'];

        $numOfVisitMedia = json_decode($exportData->data, true)['numOfVisitMedia'];

        // usersPdf is the view that includes the downloading content
        $view = \View::make('PdfDemo', [
            'visit'=>$visit,
            'project'=>$project,
            'presentMembers'=>$presentMembers,
            'visitationnotes'=>$visitationnotes,
            'visitMedia'=>$visitMedia,
            'numOfVisitMedia'=>$numOfVisitMedia
            //'visitDate'=>$visitDate,
            //'projectNumber'=>$projectNumber,
            //'projectName'=>$projectName,
            ]);
        $html_content = $view->render();
        // Set title in the PDF
        PDF::SetTitle("Begehung: " . $visit['title']);
        PDF::AddPage();
        PDF::writeHTML($html_content, true, false, true, false, '');

        $filename = $project['number'] . '_' . $visit['date'] . '_' . uniqid() . '.pdf';

        // first save the report
        PDF::Output(storage_path('app/public/reports/'.$filename), 'F');

        //write the report in DB
        DB::table('reports')->insert([
            ['filename' => $filename, 'visit_id' => $visit['id'], 'created_at' => now()]
        ]);

        //open the report
        //PDF::Output($filename);

        //ExportData::where('idString', '=', $idString)->delete();

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


