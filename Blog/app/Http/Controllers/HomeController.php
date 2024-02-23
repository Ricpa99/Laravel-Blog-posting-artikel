<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class HomeController extends BaseController
{
   
    public function index(){
        //menggunakan methode request untuk menangkap form dari url
        $title = '';
        if (request('kategori')) {
            $kategori = Category::firstWhere('title', request('kategori'));
            $title = $kategori->title;
        }
        if (request('authors')) {
            $user = user::firstWhere('name', request('authors'));
            $title = $user->name;
        }
        return view('home',[
            "judul" => "Home",
            "title" =>  $title,
            // "model" => post::all(),
            // penggunaan latest() akan menampilkan data terakhir yang dimasukkan
            // all() untuk menampilakn semua data
            // get() untuk menampilkan datanya
            // paginate(5) untuk menampilkan data berapa yang diinginkan
            "model" => post::latest()->filter(request(['search','kategori', 'authors']))->paginate(7)
        ]);
    }

    public function pricing(){
        return view('postkategori', [
            "judul" => "Post kategori",
            "kategori" => Category::all(),
        ]);
    }

    public function post(Post $post){
        return view('post', [
            "judul" => 'Home',
            "post" => $post,
            
        ]);
    }

    public function kategori(Category $category){
        return view('kategori', [
            "judul" => 'Home',
            "nama" => $category->nama,
            "post" => $category->post,
            // "kategori" => $category->nama,
        ]);
    }
    
    public function authors(User $user){
        return view('authors', [
            'judul' => 'Home',
            'post' => $user->post,
            'nama' => $user->name,
        ]);
    }
}
