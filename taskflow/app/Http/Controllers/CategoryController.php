<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() {
        $categories = Auth::user()->categories()->get();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(CategoryRequest $request) {
        Auth::user()->categories()->create($request->validated());
        return redirect('categories');
    }

    public function edit(Category $category) {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category) {
        $category->update($request->validated());
        return redirect('categories');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect('categories');
    }
}