<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //
    public function index(UpdateRequest $request, Tag $tag)
    {
        Tag::find($tag->id)->update($request->validated());
        return redirect()->route('admin.tags.index');
    }
}
