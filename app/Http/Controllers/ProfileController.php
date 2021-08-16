<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
        auth()->user()->profile()->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'url'=> $request->url,
        ]);
        return redirect()->route('profile.index',auth()->user()->id);

    }

}
