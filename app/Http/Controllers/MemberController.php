<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Member;
use App\Visit;
use App\Contact;
use App\Subarea;

class MemberController extends Controller
{

    /**
     * Create a new member instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function newMember(Request $request) {
        $member = new Member;

        $member->contact_id = $request->contactID;
        $member->project_id = $request->projectID;
        $member->subarea_id = $request->subareaID;

        $member->save();
    }


    /**
     * Update the member with the given id.
     *
     * @param $id The id of the member
     * @param  Request  $request
     * @return Response
     */
    public function updateMember(Request $request, $memberID) {
        $member = Member::where('id', '=', $memberID)->first();

        if (member != null) {
            $member->contact_id = $request->contactID;
            $member->subarea_id = $request->subareaID;
            $member->save();
        }
    }


    /**
     * Returns all members of a project as json.
     *
     * @return mixed
     */
    public function projectMembersJson($projectID) {

        $members = Member::where('project_id', '=', $projectID)->get();

        for ($i = 0; $i < sizeof($members); $i++) {

            $contact = $members[$i]->contact;

            $subarea = $members[$i]->subarea;

            $item = [
                'company' => $contact['company'],
                'surname' => $contact['surname'],
                'firstname' => $contact['firstname'],
                'email' => $contact['email'],
                'subarea' => $subarea['title'],
            ];

            $result[] = $item;
        }

        return json_encode($result);
    }


    /**
     * Returns the member with the given id.
     *
     * @param $memberID
     * @return array|null
     */
    public function getMember($memberID) {
        $member = Member::where('id', '=', $memberID)->first();

        if ($member == null) {
            return null;
        }

        return json_encode($member);
    }


}
