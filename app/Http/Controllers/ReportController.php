<?php

namespace App\Http\Controllers;

use App\Member;
use App\Report;
use App\Visit;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DateTime;
use App\Pdf;


class ReportController extends Controller {

    /**
     * Get all reports as json.
     *
     * @return json
     */
    public function reportsJson() {
       
	$reports = Report::all();

        
/*
        foreach ($reports as $report) {
            $item = [
                'id' => $report->id,
                'filename' => $report->filename,
                'created_at' => $report->created_at,
                'visit_id' => $report->visit['id'],
                'visit_date' => $report->visit['date'],

            ];

            $result[] = $item;
        }
*/
        return json_encode($reports);

}


    /**
     * Get all reports for a certain project as json.
     * @param $projectID
     * @return json
     */
/*
    public function projectReportsJson($projectID) {
       //get all visits of the project
        $visits = Visit::where('project_id', '=', $projectID)->get();

        $reports = [];
	$result = [];

        foreach ($visits as $visit) {
           $reports[] = Report::where('visit_id', $visit->id)->get(['id','filename','visit_id','log','created_at','updated_at']);
	   

	   $counter = 1;
           foreach ($reports as $report) {
             $item = [
                'id' => $report[$counter]['id'],
               // 'filename' => $report[$counter],
               // 'created_at' => $report[$counter]->created_at,
               // 'log' => $report[$counter]->log,
               // 'visit_id' => $report[$counter]['visit_id'],
               // 'visit_date' => $report[$counter]['visit_date'],

            ];
	   
	    $counter += 1;

            $result[] = $item;
	  }

        }

        return json_encode($reports);
	

    }
*/


public function projectReportsJson($projectID)
{
    $reports = Report::whereHas('visit', function($q) use ($projectID) {
        $q->where('project_id', $projectID);
    })->get(['id','filename','visit_id', 'log','created_at','updated_at']);

    return response()->json($reports->values());
}


    /**
     * get all reports for a certain visit as json.
     *
     * @param $visitID
     * @return false|string
     */
    public function visitReportsJson($visitID) {
        $reports = Report::where('visit_id', $visitID)->get();

        $result = [];

        foreach ($reports as $report) {
            $item = [
                'id' => $report->id,
                'filename' => $report->filename,
                'created_at' => $report->created_at,
                'log' => $report->log,
                'visit_id' => $report->visit['id'],
                'visit_date' => $report->visit['date'],

            ];

            $result[] = $item;
        }

        return json_encode($result);
    }


    /**
     * Deletes a report.
     *
     * @param $reportID
     */
    public function deleteReport($reportID) {
        $report = Report::where('id', $reportID)->first();

        if ($report != null) {

            $filename = $report->filename;

            if (file_exists(storage_path('app/public/reports/'.$filename))) {
                unlink(storage_path('app/public/reports/' . $filename));
            }

            $report->delete();
        }
    }


    /**
     * Sends a report to the subscripted members of a visit.
     *
     * @param $reportID
     */
    public function sendReport($reportID) {

        $report = Report::where('id', $reportID)->first();

        $visit = $report->visit;

        $visitDate = $visit->date;

        $project = $visit->project;

        $projectName = $project->name;


        //get all documents of this visit
        $documents = Pdf::where('visit_id', $visit->id)->get();


        //who has a subscription for visit mail at the moment?
        //get all members of the project
        $members = Member::where('project_id', '=', $report->visit->project_id)->get();

        $subscribedMembers = [];
        //run through the members and decide if he has a subscription for the visit or not
        for ($n = 0; $n < sizeof($members); $n++) {
            $member = $members[$n];
            $membersVisits = $member->subscribedVisits;
            for ($i = 0; $i < sizeof($membersVisits); $i++) {
                if ($membersVisits[$i]['id'] == $report->visit->id) {
                    $subscribedMembers[] = $member;
                }

            }
        }

        //run through the subscribed members and write the mail addresses into the array
        $emptyMailFlag = 0;
        $mailAddresses = [];
        foreach($subscribedMembers as $member) {
            if ($member->contact->email != null) {
                $mailAddresses[] = $member->contact->email;
            } else {
                $emptyMailFlag = 1;
            }
        }

        $log = $report->log;

        $log = $log . '<i class="far fa-envelope"></i> ' . now() . ', ';

        for($i = 0; $i < count($mailAddresses); $i++) {

            $log .= $mailAddresses[$i];

            if ($i + 1 != count($mailAddresses)) {
                $log .= ", ";
            }

            //send mail with attached report
            $to_email = $mailAddresses[$i];

            $date = new DateTime($visitDate);

            $mailAddressees = "";

            foreach($subscribedMembers as $member) {
                if ($member->contact->email != null) {
                    $mailAddressees .= $member->contact->company;
                    $mailAddressees .= ' (' . $member->contact->email . ') ';
                    $mailAddressees .= ", ";
                } 
            }

            $mailAddressees = Str::substr($mailAddressees, 0, Str::length($mailAddressees) - 2);
            
            $data = array(
                'projectName' => $projectName,
                'visitDate' => $date->format('d.m.Y'),
                'addressees' => $mailAddressees
            );
            try {
                Mail::send('emails.mail', $data, function ($message) use ($to_email, $report, $visitDate, $projectName, $documents) {
                    $message->to($to_email)
                        ->subject($projectName . ', Begehungsbericht ' . $visitDate)
                        ->from('bauleitung@bautagebuch-cloud.de', 'maier + maier architekten gmbh');
                    $message->attach('storage/app/public/reports/' . $report->filename, [
                        'mime' => 'application/pdf'
                    ]);
                    foreach ($documents as $document) {
                        $message->attach('storage/app/public/documents/' . $document->filename, [
                            'mime' => 'application/pdf'
                        ]);
                    }
                });
            } catch (\Exception $e) {                
                $log .= 'Der Bericht konnte aufgrund eines Problems mit der E-Mail-Adresse '.$mailAddresses[$i].' nicht gesendet werden!' . '<br>';
                $report->log = $report->log.$log;
                $report->save();
                return;
            }

        }

        if (count($documents) > 0) {
            $log .= " (Anlagen: ";
            for ($j = 0; $j < count($documents); $j++) {
                    $log .= $documents[$j]->filename;
                if ($j + 1 != count($documents)) {
                    $log .= ", ";
                }
            }
            $log .= ")";
        }

        $log .= '<br>';

        $report->log = $log;
        $report->save();

    }

}
