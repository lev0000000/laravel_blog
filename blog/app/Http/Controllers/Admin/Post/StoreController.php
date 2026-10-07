<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //
    public function index(StoreRequest $request)
    {
        Post::firstOrCreate($request->validated());

        return redirect()->route('admin.posts.index');
    }
}
