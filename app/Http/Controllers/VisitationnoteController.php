<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Member;
use App\Contact;
use App\Subarea;
use App\Visit;
use App\Project;
use App\Visitationnote;

class VisitationnoteController extends Controller
{

    /**
     * Get the visitationnotes for a visit.
     *
     * @param $visitID The visit_id of the visit
     * @return false|string|null
     */
    public function projectVisitationnotes($visitID) {
        $visitationnotes = Visitationnote::where('visit_id', '=', $visitID)->get();

        if ($visitationnotes != null) {
            return json_encode($visitationnotes);
        }

        return null;
    }

    /**
     * Create a new visit instance.
     *
     * @param  Request  $request
     * @param  $projectID The project_id od the project
     * @return Response
     */
    public function newVisit(Request $request, $projectID) {
        $visit = new Visit;

        $visit->title = $request->title;
        $visit->date = $request->date;
        $visit->time = $request->time;
        $visit->weather = $request->weather;
        $visit->description = $request->description;
        $visit->project_id = $projectID;

        $visit->save();
    }


    /**
     * Update the visit with the given id.
     *
     * @param $visitID The visit_id of the visit
     * @param  Request  $request
     * @return Response
     */
    public function updateVisit(Request $request, $visitID) {
        $visit = Visit::where('id', '=', $visitID)->first();

        if (visit != null) {
            $visit->title = $request->title;
            $visit->date = $request->date;
            $visit->time = $request->time;
            $visit->weather = $request->weather;
            $visit->description = $request->description;
            $visit->save();
        }
    }


    /**
     * Returns all visits of a project as json.
     *
     * @param $projectID
     * @return mixed
     */
    public function projectVisitsJson($projectID) {

        $visits = Visit::where('project_id', '=', $projectID)->get();

        return json_encode($visits);
    }


    /**
     * Returns the single view for the visit with the given id.
     *
     * @param $visitID The visit_id of the visit
     * @return array|null
     */
    public function showVisit($visitID) {

        $visit = Visit::where('id', '=', $visitID)->first();

        $project = Project::where('id', '=', 1)->first();

        return view('visit')
            ->with('project', $project)
            ->with('visit', $visit);

    }


    /**
     * Sets the done status of the visitationnote.
     *
     * @param Request $request
     * @param $visitationnoteID
     */
    public function setDone(Request $request, $visitationnoteID) {

        $done = $request->done;

        $visitationnote = Visitationnote::where('id', '=', $visitationnoteID)->first();

        if ($visitationnote != null) {
            if ($done) {
                $visitationnote->done = 1;
            } else {
                $visitationnote->done = 0;
            }
            $visitationnote->save();
        }

    }


}
