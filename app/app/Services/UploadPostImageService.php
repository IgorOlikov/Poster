<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadPostImageService
{
    public function storePostImage(?UploadedFile $image) : ?string
    {
        if(!is_null($image)) {
            $imagePath = $image->store('images/posts');
            $imagePath = \env('APP_URL') . "/storage/" . $imagePath;

                return $imagePath;
            }
            return null;

    }

    public function updatePostImage()
    {
        //
    }

    public function deletePostImage()
    {
        //
    }




}
