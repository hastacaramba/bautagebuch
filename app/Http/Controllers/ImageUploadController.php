<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        return $imageName;

    }

    /**
     * @param Request $request
     * @return string
     */
    public function imageUploadPostVisitationnote(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $visitationnoteID = $request->visitationnoteID;

        $media = new Media();
        $media->filename = $imageName;
        $media->visitationnote_id = $visitationnoteID;
        $media->save();

        return $imageName;

    }


    /**
     * @param Request $request
     * @return string
     */
    public function imageUploadPostVisit(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $visitID = $request->visitID;

        $media = new Media();
        $media->filename = $imageName;
        $media->visit_id = $visitID;
        $media->save();

        return $imageName;

    }

}