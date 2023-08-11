<?php

namespace App\Http\Controllers;

use App\Visitationnote;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Member;
use App\Media;
use App\Pdf;
use App\Visit;
use App\Project;
use App\User;
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
        
        //update updated_at for this project
        updateProjectUpdatedAt($projectID);
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
            $visit->user_id = $request->userID;
            $visit->date = $request->date;
            $visit->time = $request->time;
            $visit->weather = $request->weather;
            $visit->description = $request->description;
            $visit->save();
        }
    }


    /**
     * Deletes the visit with the given id.
     *
     * @param $visitID
     */
    public function deleteVisit($visitID) {
        $visit = Visit::where('id', '=', $visitID)->first();

        if ($visit != null) {
            $visit->delete();
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

        //run through the visits and decide if there are open visitationnotes
        for ($n = 0; $n < sizeof($visits); $n++) {

            //fetch the visitationnotes of the visit
            $visitationnotes = Visitationnote::where('visit_id', '=', $visits[$n]['id'])->get();
            //run through the visitationnotes and check if there is still one not done yet
            $notdone = 0;
            for ($i = 0; $i < sizeof($visitationnotes); $i++) {
                if ($visitationnotes[$i]['done'] === 0) {
                    $notdone = 1;
                }
            }

            $visitsEdited[] = [
                "id" => $visits[$n]->id,
                "title" => $visits[$n]->title,
                "date" => $visits[$n]->date,
                "time" => $visits[$n]->time,
                "weather" => $visits[$n]->weather,
                "description" => $visits[$n]->description,
                "project_id" => $visits[$n]->project_id,
                "user_id" => $visits[$n]->user_id,
                "created_at" => $visits[$n]->created_at,
                "updated_at" => $visits[$n]->updated_at,
                "notdone" => $notdone
            ];

        }

        return json_encode($visitsEdited);
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

        $users = User::all();

        return view('visit')
            ->with('project', $project)
            ->with('visit', $visit)
            ->with('users', $users);

    }


    /**
     * Returns the view for creating a new visit.
     *
     * @return array|null
     */
    public function createVisit(Request $request, $projectID) {

        $visit = new Visit;

        $visit->title = 'Baustellenbegehung';
        $visit->user_id = $request->userID;
        $visit->date = date('Y-m-d');
        $visit->time = date('H:i');
        $visit->weather = '';
        $visit->description = '';
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
            $membersVisits = $member->visits;
            for ($i = 0; $i < sizeof($membersVisits); $i++) {
                if ($membersVisits[$i]['id'] == $visitID) {
                    $presentMembers[] = $member;
                }

            }
        }

        $subscribedMembers = [];

        //run through the members and decide if he has a subscription for the visit or not
        for ($n = 0; $n < sizeof($members); $n++) {
            $member = $members[$n];
            $membersVisits = $member->subscribedVisits;
            for ($i = 0; $i < sizeof($membersVisits); $i++) {
                if ($membersVisits[$i]['id'] == $visitID) {
                    $subscribedMembers[] = $member;
                }

            }
        }


        $result = [];

        for ($n = 0; $n < sizeof($members); $n++) {
            if (in_array($members[$n],$presentMembers) && in_array($members[$n],$subscribedMembers)) {
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
                    "present" => 1,
                    "subscribe" => 1
                ];
            }
            if (in_array($members[$n],$presentMembers) && !(in_array($members[$n],$subscribedMembers))) {
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
                    "present" => 1,
                    "subscribe" => 0
                ];
            }
            if (!(in_array($members[$n],$presentMembers)) && !(in_array($members[$n],$subscribedMembers))) {
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
                    "present" => 0,
                    "subscribe" => 0
                ];
            }
            if (!(in_array($members[$n],$presentMembers)) && in_array($members[$n],$subscribedMembers)) {
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
                    "present" => 0,
                    "subscribe" => 1
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

        $presenceCheck = DB::table('presences')->where([
            ['member_id', '=', $memberID],
            ['visit_id', '=', $visitID],
        ])->first();

        if ($presence && $presenceCheck == null) {
            DB::table('presences')->insert([
                ['member_id' => $memberID, 'visit_id' => $visitID]
            ]);
        }

        if (!$presence && $presenceCheck != null) {
            DB::table('presences')->where([
                ['member_id', '=', $memberID],
                ['visit_id', '=', $visitID],
            ])->delete();
        }

    }

    /**
     * Sets the subscriptions for a member for a visit.
     *
     * @param Request $request
     * @param $visitID
     */
    public function setSubscriptions(Request $request, $visitID) {

        $memberID = $request->memberID;

        $subscription = $request->subscribe;

        $subscriptionCheck = DB::table('subscriptions')->where([
            ['member_id', '=', $memberID],
            ['visit_id', '=', $visitID],
        ])->first();

        if ($subscription && $subscriptionCheck == null) {
            DB::table('subscriptions')->insert([
                ['member_id' => $memberID, 'visit_id' => $visitID]
            ]);
        }

        if (!$subscription && $subscriptionCheck != null) {
            DB::table('subscriptions')->where([
                ['member_id', '=', $memberID],
                ['visit_id', '=', $visitID],
            ])->delete();
        }
    }


    /**
     * Get the media of the visit.
     */
    public function getVisitMedia($visitID) {
        $media = Media::where('visit_id', $visitID)->get();

        return $media;
    }


    /**
     * Get the pdfs of the visit.
     */
    public function getVisitPdfs($visitID) {
        $pdfs = Pdf::where('visit_id', $visitID)->get();

        return $pdfs;
    }


}
