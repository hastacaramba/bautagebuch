<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Media;

class MediaController extends Controller
{
    /**
     * Delete the media with the given id.
     *
     * @param $mediaID The id of the media
     */
    public function deleteMedia($mediaID) {
        $media = Media::where('id', '=', $mediaID)->first();

        if ($media != null) {
            $media->delete();
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
                'id' => $members[$i]['id'],
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
