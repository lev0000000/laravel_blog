<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    //
    public function index(UpdateRequest $request, Category $category)
    {
        Category::find($category->id)->update($request->validated());

        return redirect()->route('admin.categories.index');
    }
}
