<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function register(){
        return view('register', [
            'judul' => 'Register',
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            // validasi untuk mengatur request dari data post/get yang dikirim
            // cara pertama validasi request
            'name' =>'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            // cara kedua validasi request
            'email' => ['required','email','unique:users'],
            'password' => ['required', 'min:5','max:255'],
        ]);
            
            // enkripsi password
            $validated['password'] = bcrypt($validated['password']);
            // enkripsi password cara kedua
            // $validated['password'] = Hash::make($validated['password']);
            // insert data
            User::create($validated);
            return redirect('/login')->with('sukses', 'Registration  successfull! please login');
    
      
    }
}
