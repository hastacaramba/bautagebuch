<?php

namespace App\Http\Controllers;

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
        $project->photo = $request->photo;
        $project->save();
    }


    /**
     * Update the project with the given id.
     *
     * @param $id The id of the project
     * @param  Request  $request
     * @return Response
     */
    public function updateProject(Request $request, $projectID) {
        $project = Project::where('project_id', '=', $projectID)->first();

        if ($project != null) {
            $project->name = $request->name;
            $project->number = $request->number;
            $project->street = $request->street;
            $project->housenumber = $request->housenumber;
            $project->postcode = $request->postcode;
            $project->city = $request->city;
            $project->photo = $request->photo;
            $project->save();
        }
    }


    /**
     * Returns all projects in DB table projects as json.
     *
     * @return mixed
     */
    public function projectsJson() {

        $projects = Project::all();

        return json_encode($projects);
    }


    /**
     * Returns the project with the given id.
     *
     * @param $projectID
     * @return array|null
     */
    public function getProject($projectID) {
        $project = Project::where('project_id', '=', $projectID)->first();

        if ($project == null) {
            return null;
        }

        return view('project', [
            'projectID' => $project->project_id,
            'number' => $project->number,
            'name' => $project->name,
            'street' => $project->street,
            'housenumber' => $project->housenumber,
            'postcode' => $project->postcode,
            'city' => $project->city,
            'created_at' => $project->created_at,
            'updated_at' => $project->updated_at,
            'photo' => $project->photo
        ]);
    }


}
