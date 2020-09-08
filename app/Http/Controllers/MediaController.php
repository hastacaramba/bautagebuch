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
     * Edit the info of the media with the given id.
     *
     * @param Request $request
     * @param $mediaID
     */
    public function editMedia(Request $request, $mediaID) {
        $media = Media::where('id', $mediaID)->first();

        if ($media != null) {
            $media->info = $request->info;
            $media->save();
        }
    }


    /**
     * Rotate the media for 90 degrees
     *
     * @param Request $request
     * @param $mediaID
     */
    public function rotateMedia(Request $request, $mediaID) {
        $media = Media::where('id', $mediaID)->first();

        if ($media != null) {

            // File and rotation
            $imagePath = public_path('/images');
            $rotateFilename = $imagePath.$media->filename; // PATH
            $degrees = 90;
            $fileType = strtolower(substr('$media->filename', strrpos('$media->filename', '.') + 1));

            if($fileType == 'png'){
                header('Content-type: image/png');
                $source = imagecreatefrompng($rotateFilename);
                $bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
                // Rotate
                $rotate = imagerotate($source, $degrees, $bgColor);
                imagesavealpha($rotate, true);
                imagepng($rotate,$rotateFilename);

            }

            if($fileType == 'jpg' || $fileType == 'jpeg'){
                header('Content-type: image/jpeg');
                $source = imagecreatefromjpeg($rotateFilename);
                // Rotate
                $rotate = imagerotate($source, $degrees, 0);
                imagejpeg($rotate,$rotateFilename);
            }

            // Free the memory
            imagedestroy($source);
            imagedestroy($rotate);

            //$media->save();
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
