<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use App\Subarea;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $subarea = Subarea::where('id', '=', $subareaID)->first();

        if ($subarea != null) {
            $subarea->title = $request->title;

            $subarea->save();
        }
    }


    /**
     * Deletes a subarea by id.
     *
     * @param $subareaID
     * @return string
     */
    public function deleteSubarea($subareaID) {
        $subarea = Subarea::where('id', '=', $subareaID)->first();

        if ($subarea != null) {
            $subarea->delete();

            return "Subarea successfully deleted.";
        }

        return "Subarea was not found.";
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
        $subarea = Subarea::where('id', '=', $subareaID)->first();

        if ($subarea == null) {
            return null;
        }

        $result = [
            'title' => $subarea->title,
        ];
    }


    /**
     * Get Subareas for select2.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubareasSelect(Request $request) {

        $q = $request->get('q', null);

        $_type = $request->get('_type', null);

        //get subareas
        $subareas = Subarea::all();

        $results = [];
        for ($i = 0; $i < sizeof($subareas); $i++) {
            $results[] =
                [
                    'id' => $subareas[$i]['id'],
                    'text' => $subareas[$i]['title']
                ];
        }

        $antwort = [
            'results' => $results
        ];

        $resultsGefiltert = [];
        if($q != null && $_type == 'query') {
            for ($i = 0; $i < sizeof($antwort['results']); $i++) {
                if (Str::contains(Str::lower($antwort['results'][$i]['text']), Str::lower($q))) {
                    $resultsGefiltert[] = $antwort['results'][$i];
                }
            }
            $antwort['results'] = $resultsGefiltert;
        }

        return response()->json($antwort,200);

    }


}
