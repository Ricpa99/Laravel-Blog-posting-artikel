<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.post.index', [
            'judul' => 'Post',
            'post' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create',[
            'judul' => 'Create post',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'required|image:file|max:1020'
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('IMG');
        }

       $validated['user_id'] = auth()->user()->id;
       $validated['excerpt'] = Str::limit(strip_tags($request->get('body'), 200)); 
       Post::create($validated);
       return redirect('/dashboard/post')->with('success', 'New post has been added');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show',[
            'judul' => "Postingan",
            'post' => $post,
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit',[
            'judul' => "Edit",
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1020'
        ]);
        
        if ($request->slug != $post->slug) {
            $validated['slug'] = 'required|unique:posts';
        }
        
        if ($request->file('image')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validated['image'] = $request->file('image')->store('IMG');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->get('body'), 200)); 
        $post::where('id', $post->id)->update($validated);
        return redirect('/dashboard/post')->with('success', 'New post has been updated');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Request $request)
    {
        // return $request->all();
        Storage::delete($request->oldImg);
        Post::destroy($post->id);
        return redirect('/dashboard/post')->with('success', 'New post has been deleted ');
    }
}
