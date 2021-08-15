<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('Posts.create');

    }

    public function store(PostCreateRequest $request)
    {
        //todo : Set Image path
        $image_path = $request->image->store('uploads','public');

        # todo : Image Intervention Package   with path of our image and fit it
        $image = Image::make(public_path("storage/".$image_path))->fit(1080,1350);
        $image->save();
        //todo : Create Post with User_id( authenticated user )
        auth()->user()->posts()->create([
            'caption' => $request->caption,
            'image' => $image_path,
        ]);
        return redirect(route('profile.index',auth()->user()->id));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('Posts.show')->with('post',$post);
    }
}
