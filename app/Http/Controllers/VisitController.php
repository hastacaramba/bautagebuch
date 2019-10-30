<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Member;
use App\Contact;
use App\Subarea;
use App\Visit;
use App\Project;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{

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

        if ($visit != null) {
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

        $project = Project::where('id', '=', $visit->project_id)->first();

        return view('visit')
            ->with('project', $project)
            ->with('visit', $visit);

    }


    /**
     * Returns the view for creating a new visit.
     *
     * @return array|null
     */
    public function createVisit($projectID) {

        $visit = new Visit;

        $visit->title = 'Bezeichnung...';
        $visit->date = date('Y-m-d');
        $visit->time = date('H:i');
        $visit->weather = 'Wetter...';
        $visit->description = 'Bemerkungen zur Begehung (Freitext)...';
        $visit->project_id = $projectID;

        $visit->save();

        return $visit->id;

    }


    /**
     * Returns the present members of a visit.
     *
     * @param $visitID
     * @return false|string
     */
    public function getPresentMembers($visitID) {

        //get visit
        $visit = Visit::where('id', '=', $visitID)->first();

        //get all members of the project
        $members = Member::where('project_id', '=', $visit->project_id)->get();

        $presentMembers = [];

        //run through the members and decide if he was present during visit or not
        for ($n = 0; $n < sizeof($members); $n++) {
            $member = $members[$n];
            $membersContact = $member->contact;
            $membersVisits = $member->visits;
            for ($i = 0; $i < sizeof($membersVisits); $i++) {
                if ($membersVisits[$i]['id'] == $visitID) {
                    $presentMembers[] = $member;
                }
            }
        }

        $result = [];

        for ($n = 0; $n < sizeof($members); $n++) {
            if (in_array($members[$n],$presentMembers)) {
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
                    "present" => 1
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
                    "present" => 0
                ];
            }
        }

        return json_encode($result);

    }


    /**
     * Sets the presence Status for a member for a visit.
     *
     * @param Request $request
     * @param $visitID
     */
    public function setPresentMembers(Request $request, $visitID) {

        $memberID = $request->memberID;

        $presence = $request->presence;

        //get visit
        //$visit = Visit::where('id', '=', $visitID)->first();

        //get the member
        //$member = Member::where('id', '=', $memberID)->first();

        $presenceCheck = DB::table('member_visit')->where([
            ['member_id', '=', $memberID],
            ['visit_id', '=', $visitID],
        ])->first();

        if ($presence && $presenceCheck == null) {
            DB::table('member_visit')->insert([
                ['member_id' => $memberID, 'visit_id' => $visitID]
            ]);
        }

        if (!$presence && $presenceCheck != null) {
            DB::table('member_visit')->where([
                ['member_id', '=', $memberID],
                ['visit_id', '=', $visitID],
            ])->delete();
        }

    }


}
