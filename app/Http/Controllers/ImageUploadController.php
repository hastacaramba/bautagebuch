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
        //get the filetype by extension
        $extension = $request->image->extension();

        if ($extension === "pdf") {

            $request->validate([
                'image' => 'required|pdf_file|mimes:pdf|max:900240',
            ]);

            $pdf = $request->file('image');

            $pdfName = time().'.'.$request->image->extension();

            $destinationPath = public_path('images');

            $pdf->save($destinationPath.'/'.$pdfName);

            return $pdfName;

        } else {

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


    }

    /**
     * @param Request $request
     * @return string
     */
    public function imageUploadPostVisitationnote(Request $request)
    {

        //get the filetype by extension
        $extension = $request->image->extension();

        if ($extension === "pdf") {
            $request->validate([
                'image' => 'required|pdf_file|mimes:pdf|max:900240',
            ]);

            $image = $request->file('image');

            $imageName = time().'.'.$request->image->extension();

            $destinationPath = public_path('images');

            $request->move($destinationPath,$imageName);



            //$img = Image::make($image->getRealPath());

            //$img->resize(1000, 1000, function ($constraint) {
            //    $constraint->aspectRatio();
            //})->save($destinationPath.'/'.$imageName);

            $visitationnoteID = $request->visitationnoteID;

            $media = new Media();
            $media->filename = $imageName;
            $media->visitationnote_id = $visitationnoteID;
            $media->save();

            return $imageName;

        } else {

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
            $media->filename = $imageName;
            $media->visitationnote_id = $visitationnoteID;
            $media->save();

            return $imageName;
        }



    }


    /**
     * @param Request $request
     * @return string
     */
    public function imageUploadPostVisit(Request $request)
    {
        //get the filetype by extension
        $extension = $request->image->extension();

        if ($extension === "pdf") {

            $request->validate([
                'image' => 'required|pdf_file|mimes:pdf|max:900240',
            ]);

            $image = $request->file('image');

            $imageName = time().'.'.$request->image->extension();

            $destinationPath = public_path('images');

            $image->save($destinationPath.'/'.$imageName);

            $visitID = $request->visitID;

            $info = $request->info;

            $media = new Media();
            $media->filename = $imageName;
            $media->info = $info;
            $media->visit_id = $visitID;
            $media->save();

            return $imageName;

        } else {

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