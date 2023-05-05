<?php

namespace App\Http\Controllers;

use App\Member;
use App\Report;
use Illuminate\Support\Facades\Mail;
use DateTime;
use App\Pdf;


class ReportController extends Controller {

    /**
     * Get all reports as json.
     *
     * @return false|string
     */
    public function reportsJson() {
        $reports = Report::all();

        $result = [];

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

        return json_encode($result);
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

            $data = array(
                'projectName' => $projectName,
                'visitDate' => $date->format('d.m.Y')
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
                    $message->text('Diese E-Mail ging an folgende Adressaten: ');
                    /*foreach($subscribedMembers as $member) {
                        if ($member->contact->email != null) {
                            $message->attach($member->contact->email);
                        }
                    }*/
                });
            } catch (\Exception $e) {
                $log = '<br>';
                $log .= 'Der Bericht konnte aufgrund eines Problems mit der E-Mail-Adresse '.$mailAddresses[$i].' nicht gesendet werden!';
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
