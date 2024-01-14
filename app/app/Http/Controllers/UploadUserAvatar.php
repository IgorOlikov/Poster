<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadUserAvatar extends Controller
{

    public function __invoke(AvatarUploadRequest $request)
    {
        if ($request->hasFile('image')){
            $oldAvatar= $request->user()->avatar;

            if(!is_null($oldAvatar)){
                if (\env('DEFAULT_AVATAR') === $oldAvatar){
                    goto saveFile;
                }
                $oldToDelete = explode('http://localhost/storage/images/profile/',$oldAvatar);
                $oldToDelete = $oldToDelete[1];
                Storage::disk('public')->delete("images/profile/$oldToDelete");
            }
            saveFile:
            $localImagePath = $request->file('image')->store('images/profile');
            $publicPathToImage =  \env('APP_URL')."/storage/".$localImagePath;
            $newImagePath = ['avatar' => (string)$publicPathToImage];
            $user = $request->user()->forceFill($newImagePath);
            $user->save();
            return redirect("/users/$user->id");
        }else{
            return response('the image was not loaded',403);
        }
    }

}
