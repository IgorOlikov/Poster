<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request,User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function uploadProfileImage(Request $request,User $user)
    {
        ////!!!! validated

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

    public function createImage(User $user)
    {
        return view('users.create-user-image',compact('user'));
    }
}
