<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        $category = Category::find($posts)->keyBy('id')->toArray();
        return view('admin.post.index', compact('posts', 'category'));
    }
}
