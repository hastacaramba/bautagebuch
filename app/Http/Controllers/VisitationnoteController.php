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
use Illuminate\Support\Facades\DB;

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

            $visitationnote->done = $done;

            $visitationnote->save();
        }

        $visitationnote = Visitationnote::where('id', '=', $visitationnoteID)->first();

        return $visitationnote->done;

    }


    /**
     * Deletes a visitationnote.
     *
     * @param $visitationnoteID
     */
    public function deleteVisitationnote($visitationnoteID) {
        $visitationnote = Visitationnote::where('id', '=', $visitationnoteID)->first();

        if ($visitationnote != null) {
            $visitationnote->delete();
        }

    }


    /**
     * Updates a visitationnote.
     *
     * @param Request $request
     * @param $visitationnoteID
     */
    public function updateVisitationnote(Request $request, $visitationnoteID) {

        //get the visitationnote by id
        $visitationnote = Visitationnote::where('id', '=', $visitationnoteID)->first();

        if ($visitationnote != null) {
            $visitationnote->title = $request->title;
            $visitationnote->created_at = $request->date;
            $visitationnote->deadline = $request->deadline;
            $visitationnote->notes = $request->notes;
            $visitationnote->done = $request->done;
            $visitationnote->category = $request->category;
            $visitationnote->save();
        }
    }


    /**
     * Creates new visitationnote.
     *
     * @param Request $request
     * @return mixed
     */
    public function newVisitationnote(Request $request) {

        $visitationnote = new Visitationnote;

        $visitationnote->visit_id = $request->visit_id;
        $visitationnote->title = $request->title;
        $visitationnote->created_at = $request->date;
        $visitationnote->deadline = $request->deadline;
        $visitationnote->notes = $request->notes;
        $visitationnote->done = $request->done;
        $visitationnote->category = $request->category;

        $visitationnote->save();

    }


    /**
     * Returns the media associated with the visitnote.
     *
     * @param $visitationnoteID
     * @return false|string
     */
    public function getMedia($visitationnoteID) {
        $visitationnote = Visitationnote::where('id', $visitationnoteID)->first();

        $media = $visitationnote->media()->get();

        return json_encode($media);
    }


    /**
     * Returns the concerned members of a visitationnote.
     *
     * @param $visitationnoteID
     * @return false|string
     */
    public function getConcernedMembers($visitationnoteID) {

        //get visitationnote
        $visitationnote = Visitationnote::where('id', '=', $visitationnoteID)->first();

        //$visit = $visitationnote->visit()->first();

        //get all members of the project
        $members = Member::where('project_id', '=', $visitationnote->visit->project_id)->get();

        $concernedMembers = [];

        //run through the members and decide if he was present during visit or not
        for ($n = 0; $n < sizeof($members); $n++) {
            $member = $members[$n];
            $membersVisitationnotes = $member->visitationnotes()->get();
            for ($i = 0; $i < sizeof($membersVisitationnotes); $i++) {
                if ($membersVisitationnotes[$i]['id'] == $visitationnoteID) {
                    $concernedMembers[] = $member;
                }
            }
        }

        $result = [];

        for ($n = 0; $n < sizeof($members); $n++) {
            if (in_array($members[$n],$concernedMembers)) {
                $result[] = [
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
                    "concerned" => 1
                ];
            } else {
                $result[] = [
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
                    "concerned" => 0
                ];
            }
        }

        return json_encode($result);

    }


    /**
     * Sets the concerned Status for a member for a visitationnote.
     *
     * @param Request $request
     * @param $visitationnoteID
     */
    public function setConcernedMembers(Request $request, $visitationnoteID) {

        $memberID = $request->memberID;

        $concerned = $request->concerned;

        //get visit
        //$visit = Visit::where('id', '=', $visitID)->first();

        //get the member
        //$member = Member::where('id', '=', $memberID)->first();

        $concernedCheck = DB::table('member_visitationnote')->where([
            ['member_id', '=', $memberID],
            ['visitationnote_id', '=', $visitationnoteID],
        ])->first();

        if ($concerned && $concernedCheck == null) {
            DB::table('member_visitationnote')->insert([
                ['member_id' => $memberID, 'visitationnote_id' => $visitationnoteID]
            ]);
        }

        if (!$concerned && $concernedCheck != null) {
            DB::table('member_visitationnote')->where([
                ['member_id', '=', $memberID],
                ['visitationnote_id', '=', $visitationnoteID],
            ])->delete();
        }

    }

}
