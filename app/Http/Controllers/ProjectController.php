<?php

namespace App\Http\Controllers;

use App\Media;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Storage;

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

        if ($project != null) {
            $project->name = $request->name;
            $project->number = $request->number;
            $project->street = $request->street;
            $project->housenumber = $request->housenumber;
            $project->postcode = $request->postcode;
            $project->city = $request->city;
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


}
