<?php

namespace App\Http\Controllers;

use App\Media;
use App\Member;
use App\Visitationnote;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Project;
use App\Report;
use App\Projectnote;
use Illuminate\Support\Facades\DB;

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
            $report->delete();
        }
    }

}
