<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    //
    public function index(Post $posts)
    {
        return view('admin.post.show', compact('posts'));
    }
}
