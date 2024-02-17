<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.layout.categories',[
            'judul' => 'Categories',
            'category' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.layout.createCategory', [
            'judul' => 'Create category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|max:255'
       ]);
       Category::create($validated);
       return redirect('/dashboard/categories')->with('success', 'New category has been added');


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.layout.editCategory',[
            'judul' => 'Edit category',
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);

        if($validated['title'] == $category->title && $validated['slug'] == $category->slug){
            return back()->with('success', 'Name already exists');
        }

        $category::where('id', $category->id)->update($validated);
        return redirect('/dashboard/categories')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted ');
    }
}
