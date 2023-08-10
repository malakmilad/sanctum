<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = $request->file('image');
        $name = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move('upload', $name);

        $post = new Post();
        $post->image = $name;
        $post->save();
        return new PostResource($post);
    }
}
