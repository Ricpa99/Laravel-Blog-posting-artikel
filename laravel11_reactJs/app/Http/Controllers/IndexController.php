<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function home(){
        return Inertia::render('Home', [
            'title' => 'Home'
        ]);
    }

    public function about(){
        return Inertia::render('About', [
            'title' => 'About'
        ]);
    }
    
   
    public function blogs(Request $request)  {
       
        return Inertia::render('Blogs', [
            'title' => 'Blog',
            'posts' => Post::with(['author', 'category'])->latest()->filter(request('search'))->paginate(8)
            // "posts" => post::latest()->with('author', 'category')->paginate(3)->filter(),
        ]);
    }
    public function user(User $user)  {
        $use = $user->posts->load('author', 'category');
        return Inertia::render('Blogs', [
            'title' => count($use) . ' Articel by ' . $user->name,
            'posts' => Post::where('author_id', $user->id)->with('author', 'category')->paginate(8),
            // 'pos' => $user->posts->load('author', 'category')
        ]);
    }
    public function category(Category $category)  {
        return Inertia::render('Blogs', [
            'title' => ' Articel in: ' . $category->name,
            'posts' => Post::where('category_id', $category->id)->with('author', 'category')->paginate(8)
        ]);
    }
    public function blog(Post $post)  {
        return Inertia::render('Blog', [
            'title' => 'Articles by ' . $post->author->name,
            'post' => Post::where('id', $post->id)->with('author', "category")->get()
        ]);
    }
}
