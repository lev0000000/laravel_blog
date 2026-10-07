<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //
    public function index(UpdateRequest $request, Post $post)
    {
        Post::find($post->id)->update($request->validated());
        return redirect()->route('admin.posts.index');
    }
}
