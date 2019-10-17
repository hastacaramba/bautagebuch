<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Project;

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
     * Returns all projects in DB table projects as json.
     *
     * @return mixed
     */
    public function projectsJson() {

        $projects = Project::all();

        return json_encode($projects);
    }
}
