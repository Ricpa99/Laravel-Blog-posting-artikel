<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'judul' => 'Dashboard',
            'user' => Post::where('user_id', auth()->user()->id)->paginate(6)
        ]);
    }
}
