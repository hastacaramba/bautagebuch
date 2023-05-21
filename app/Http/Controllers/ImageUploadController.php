<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Image;

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

        $image = $request->file('image');

        $imageName = time().'.'.$request->image->extension();

        $destinationPath = public_path('images');

        $img = Image::make($image->getRealPath());

        $img->resize(1000, 1000, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        return $imageName;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function multiImageUploadPostVisitationnote(Request $request)
    {
        $log = "";

        $test = $request->file('arr'); 
        
        //foreach($request->file('imagename') as $file)
        foreach ($test as $image) {
            
            $imageName = time().'.'.$image->extension();

            $destinationPath = public_path('images');


            $img = Image::make($image->getRealPath());

            $img->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);

            $visitationnoteID = $request->visitationnateID;            

            $media = new Media();
            $media->filename = $imageName;
            $media->info = "";          
            $media->visitationnote_id = $visitationnoteID;
            $log .= "visitationnateID" . $visitationnateID . " zugeordnet";

            $media->save();

            $log .= ", saved";

            $imageNames[] = $imageName;

        }
        return $log;
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

        $image = $request->file('image');

        $imageName = time().'.'.$request->image->extension();

        $destinationPath = public_path('images');

        $img = Image::make($image->getRealPath());

        $img->resize(1000, 1000, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        $visitationnoteID = $request->visitationnoteID;

        $media = new Media();
        $media->info = $request->info;
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

        $image = $request->file('image');

        $imageName = time().'.'.$request->image->extension();

        $destinationPath = public_path('images');

        $img = Image::make($image->getRealPath());

        $img->resize(1000, 1000, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        $visitID = $request->visitID;

        $info = $request->info;

        $media = new Media();
        $media->filename = $imageName;
        $media->info = $info;
        $media->visit_id = $visitID;
        $media->save();

        return $imageName;

    }


    /**
     * @param Request $request
     * @return string
     */
    public function imageUploadPostEditedVisit(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $image = $request->file('image');

        $imageName = time().'.'.$request->image->extension();

        $destinationPath = public_path('images');

        $img = Image::make($image->getRealPath());

        $img->resize(1000, 1000, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);

        $mediaID = $request->mediaID;

        $info = $request->info;

        $media = Media::where('id', $mediaID)->first();
        $media->filename = $imageName;
        $media->info = $info;
        $media->save();

        return $imageName;

    }

}