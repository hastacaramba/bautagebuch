<?php

namespace App\Http\Controllers;

use App\Media;
use App\Member;
use App\Visitationnote;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Project;
use App\Projectnote;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    /**
     * Create a new project instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function newProject(Request $request) {
        $project = new Project;

        $project->name = $request->name;
        $project->number = $request->number;
        $project->street = $request->street;
        $project->housenumber = $request->housenumber;
        $project->postcode = $request->postcode;
        $project->city = $request->city;
        $project->save();
        $media = new Media();
        if ($request->photo != "" && $request->photo != null) {
            $media->filename = $request->photo;
            $media->project_id = $project->id;
            $media->save();
        } else {
            $media->filename = 'default.jpg';
            $media->project_id = $project->id;
            $media->save();
        }
    }


    /**
     * Update the project with the given id.
     *
     * @param $id The id of the project
     * @param  Request  $request
     * @return Response
     */
    public function updateProject(Request $request, $projectID) {
        $project = Project::where('id', '=', $projectID)->first();
        $now = time();

        if ($project != null) {
            $project->name = $request->name;
            $project->number = $request->number;
            $project->street = $request->street;
            $project->housenumber = $request->housenumber;
            $project->postcode = $request->postcode;
            $project->city = $request->city;
            $project->updated_at = $now;
            $project->save();

            //Does Project-File-Combi already exist?
            $check = Media::where([
                ['project_ID', $projectID],
                ['filename', $request->photo],
            ])->count();

            if ($check === 0) {
                Media::where([
                    ['project_ID', $projectID],
                ])->delete();

                $media = new Media();
                $media->filename = $request->photo;
                $media->project_id = $projectID;
                $media->save();
            }
            //updateProjectUpdatedAt($projectID);
        }
    }


     /**
     * Update project attribute updated_at with the current timestamp.
     *
     * @param $id The id of the project
     * @return Response
     */
    public function updateProjectUpdatedAt($projectID) {
        $project = Project::where('id', '=', $projectID)->first();
        $now = time();

        if ($project != null) {
            $project->updated_at = $now;
            $project->save();
        }
    }


    /**
     * Deletes a project.
     *
     * @param $projectID
     * @return string
     */
    public function deleteProject($projectID) {
        $project = Project::where('id', '=', $projectID)->first();

        if ($project != null) {
            $project->delete();


            return "Project with id " . $projectID . "successfully deleted.";
        }

        return "Project with id " . $projectID . " was not found.";

    }


    /**
     * Returns all projects in DB table projects as json.
     *
     * @return mixed
     */
    public function projectsJson() {

        $projects = Project::all();

        $result = [];

        foreach ($projects as $project) {
            $item = [
                'id' => $project->id,
                'number' => $project->number,
                'name' => $project->name,
                'street' => $project->street,
                'housenumber' => $project->housenumber,
                'postcode' => $project->postcode,
                'city' => $project->city,
                'photo' => $project->media()->first()['filename'],
                'created_at' => $project->created_at,
                'updated_at' => $project->updated_at
            ];

            $result[] = $item;
        }

        return json_encode($result);
    }


    /**
     * Returns the project with the given id.
     *
     * @param $projectID
     * @return array|null
     */
    public function getProject($projectID) {
        $project = Project::where('id', '=', $projectID)->first();

        if ($project == null) {
            return null;
        }

        return view('project', [
            'projectID' => $project->id,
            'number' => $project->number,
            'name' => $project->name,
            'street' => $project->street,
            'housenumber' => $project->housenumber,
            'postcode' => $project->postcode,
            'city' => $project->city,
            'created_at' => $project->created_at,
            'updated_at' => $project->updated_at,
            'photo' => $project->media()->first()['filename']
        ]);
    }


    /**
     * Returns the projectnotes of the project with the given id.
     *
     * @param $projectID
     * @return array|null
     */
    public function getProjectNotes($projectID) {
        $project = Project::where('id', $projectID)->first();

        if ($project == null) {
            return null;
        }

        $projectNotes = $project->projectnotes()->get();

        return json_encode($projectNotes);
    }


    /**
     * @param $projectNoteID
     */
    public function getProjectNote($projectNoteID) {
        $projectnote = Projectnote::where('id', $projectNoteID)->first();

        if ($projectnote === null) {
            return null;
        }

        return json_encode($projectnote);
    }


    /**
     * @param $projectNoteID
     * @return false|string|null
     */
    public function deleteProjectNote($projectNoteID) {
        $projectnote = Projectnote::where('id', $projectNoteID)->first();

        if ($projectnote != null) {
            $projectnote->delete();
        }
    }


    /**
     * @param Request $request
     * @param $projectnoteID
     * @return mixed
     */
    public function setDoneStatus(Request $request, $projectnoteID) {
        $done = $request->done;

        $projectnote = Projectnote::where('id', '=', $projectnoteID)->first();

        if ($projectnote != null) {

            $projectnote->done = $done;

            $projectnote->save();
        }

        $projectnote = Projectnote::where('id', '=', $projectnoteID)->first();

        return $projectnote->done;
    }


    /**
     * @param Request $request
     */
    public function newProjectNote(Request $request) {
        $projectnote = new Projectnote;
        $projectnote->project_id = $request->projectID;
        $projectnote->title = $request->title;
        $projectnote->category = $request->category;
        $projectnote->created_at = $request->date;
        $projectnote->deadline = $request->deadline;
        $projectnote->notes = $request->notes;
        $projectnote->done = $request->done;
        $projectnote->save();

        return json_encode($projectnote);
    }


    /**
     * Returns the concerned members of a visitationnote.
     *
     * @param $visitationnoteID
     * @return false|string
     */
    public function getConcernedMembers($projectnoteID) {

        //get projectnote
        $projectnote = Projectnote::where('id', '=', $projectnoteID)->first();

        //$visit = $visitationnote->visit()->first();

        //get all members of the project
        $members = Member::where('project_id', '=', $projectnote->project_id)->get();

        $concernedMembers = [];

        //run through the members and decide if he was present during visit or not
        for ($n = 0; $n < sizeof($members); $n++) {
            $member = $members[$n];
            $membersProjectnotes = $member->projectnotes()->get();
            for ($i = 0; $i < sizeof($membersProjectnotes); $i++) {
                if ($membersProjectnotes[$i]['id'] == $projectnoteID) {
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
    public function setConcernedMembers(Request $request, $projectnoteID) {

        $memberID = $request->memberID;

        $concerned = $request->concerned;

        //get visit
        //$visit = Visit::where('id', '=', $visitID)->first();

        //get the member
        //$member = Member::where('id', '=', $memberID)->first();

        $concernedCheck = DB::table('member_projectnote')->where([
            ['member_id', '=', $memberID],
            ['projectnote_id', '=', $projectnoteID],
        ])->first();

        if ($concerned && $concernedCheck == null) {
            DB::table('member_projectnote')->insert([
                ['member_id' => $memberID, 'projectnote_id' => $projectnoteID]
            ]);
        }

        if (!$concerned && $concernedCheck != null) {
            DB::table('member_projectnote')->where([
                ['member_id', '=', $memberID],
                ['projectnote_id', '=', $projectnoteID],
            ])->delete();
        }

    }


    /**
     * @param Request $request
     * @param $projectnoteID
     */
    public function updateProjectNote(Request $request, $projectnoteID) {
        $projectnote = Projectnote::where('id', $projectnoteID)->first();

        if ($projectnote != null) {
            $projectnote->title = $request->title;
            $projectnote->category = $request->category;
            $projectnote->created_at = $request->date;
            $projectnote->deadline = $request->deadline;
            $projectnote->notes = $request->notes;
            $projectnote->done = $request->done;

            $projectnote->save();
        }

    }

}
