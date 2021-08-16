<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('Profile.index', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->authorize('update',$user->profile);
        return view('Profile.edit',compact('user'));
    }

    public function update(ProfileUpdateRequest $request,$id)
    {
        $user = User::findorFail($id);

        if($request->image){
            //todo : Set Image path
            $image_path = $request->image->store('profile','public');
            # todo : Image Intervention Package   with path of our image and fit it
            $image = Image::make(public_path("storage/".$image_path))->fit(1000,1000);
            $image->save();
        }
        auth()->user()->profile()->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'url'=> $request->url,
            'image' => $image_path ?? null
        ]);
        return redirect()->route('profile.index',auth()->user()->id);

    }

}
