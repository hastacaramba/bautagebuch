<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Requests;
use Image;
class ImageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImage()
    {
        return view('resizeImage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImagePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        $this->postImage->add($input);

        return back()
            ->with('success','Image Upload successful')
            ->with('imageName',$input['imagename']);
    }


    /**
     * Rotate the media for 90 degrees
     *
     * @param Request $request
     * @param $mediaID
     */
    public function rotateImg($mediaID) {
        $media = Media::where('id', $mediaID)->first();

        if ($media != null) {

            // File and rotation
            $imagePath = public_path('/images/');
            $rotateFilename = $imagePath.$media->filename; // PATH
            $degrees = 90;
            $fileType = strtolower(substr($media->filename, strrpos($media->filename, '.') + 1));

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
        }
    }

}