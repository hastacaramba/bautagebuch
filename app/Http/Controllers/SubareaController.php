<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Subarea;
use Illuminate\Support\Facades\Storage;

class SubareaController extends Controller
{

    /**
     * Create a new subarea instance.
     *
     * @param  Request  $request
     * @return Response
     */
    public function newSubarea(Request $request) {
        $subarea = new Subarea;

        $subarea->title = $request->title;

        $subarea->save();
    }


    /**
     * Update the subarea with the given id.
     *
     * @param $subareaID The subarea_id of the subarea
     * @param  Request  $request
     * @return Response
     */
    public function updateSubarea(Request $request, $subareaID) {
        $subarea = Subarea::where('subarea_id', '=', $subareaID)->first();

        if ($subarea != null) {
            $subarea->title = $request->title;

            $subarea->save();
        }
    }


    /**
     * Returns all subareas in DB table subareas as json.
     *
     * @return mixed
     */
    public function subareasJson() {

        $subareas = Subarea::all();

        return json_encode($subareas);
    }


    /**
     * Returns the subarea with the given id.
     *
     * @param $subareaID
     * @return array|null
     */
    public function getSubarea($subareaID) {
        $subarea = Subarea::where('subarea_id', '=', $subareaID)->first();

        if ($subarea == null) {
            return null;
        }

        $result = [
            'title' => $subarea->title,
        ];
    }


}
