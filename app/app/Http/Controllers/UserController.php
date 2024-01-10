<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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


        $image = $request->validate([
            'image' => ['required','image:jpg,jpeg,png'],
        ]);

        // dd($image);
        $path = $request->file('image')->store('images'); // http://localhost/storage/images/5D1HZLLRH9hhqQx8v114r0YREMyQHHhBEj6ExV8U.png

        dd($path);
        // Storage::put('image');

        exit();
        if ($request->hasFile('image')){
            $oldImage= $request->user()->image;
            //dd($oldImage);
            if(!is_null($oldImage)){
                $deleteOldImage = @unlink("/app/storage/app/" . $oldImage); //if not null -> delete old //if image not exist physically ignore exception
                $newImage = $request ->file('image');
                $newImagePath = $newImage->store('profile');
                $image = ['image' => $newImagePath];
                $user = $request->user()->forceFill($image);
                $user->save();
                return response($user,200);
            }else{
                $newImage = $request ->file('image');
                $newImagePath = $newImage->store('profile');
                $image = ['image' => $newImagePath];
                $user = $request->user()->forceFill($image);
                $user->save();
                return response($user,200);
            }

        }else{
            return response('the image was not loaded',403);
        }

    }

    public function createImage(User $user)
    {
        return view('users.create-user-image',compact('user'));
    }
}
