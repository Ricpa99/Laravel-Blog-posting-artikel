@extends('navbar.navbar')

@section('container')
<h2>Halaman blog Category {{ $title }}</h2>

@if ($post->count())
    <div class="card mb-3">
        <img src="https://source.unplas.com/1200x1400/?{{ $post[0]->category->title }}" alt="{{ $post[0]->category->title }}" class="card-img-top">
        <div class="card-body text-center" >
            <h2> <a class="card-title text-dark text-decoration-none" href="/feature/{{ $post[0]->slug }}">{{ $post[0]->title }}</a></h2>
        by xample: <a class="text-decoration-none" href="/authors/{{ $post[0]->user->name }}"> {{ $post[0]->user->name }}</a> in 
        <a class="text-decoration-none" href="/kategori/{{ $post[0]->category->slug }}">{{ $post[0]->category->title }}</a> {{ $post[0]->created_at->diffForHumans() }}
            <p class="card-text">{{ $post[0]['excerpt'] }}</p>
            <a class=" btn btn-primary text-decoration-none" href="/feature/{{ $post[0]->slug }}">read more</a>
        </div>
    </div>
@else 
<p class="text-center fs-4">no post</p>
@endif 
<div class="container mb-3">
   <div class="row">
           @foreach ($post->skip(1) as $res) 
           <div class="col-md-4 mb-3">
               <div class="card">
                   <div class="text-white bg-dark px-3 py-2 position-absolute"><a class="text-decoration-none text-white" href="/kategori/{{ $res->category->slug }}">{{ $res->category->title }}</a></div>
                   <img class="card-img-top" src="https://source.unplas.com/500x400/?{{ $res->category->title }}" alt="{{ $res->category->title }}">
                   <div class="card-body">
                       <h5 class="card-title"><a class="text-decoration-none text-dark" href="/feature/{{ $res->slug }}">{{ $res->title }}</a></h5>
                       <p>
                           <small class="text-muted">
                               by. <a class="tex-decoration-none" href="authors/{{ $res->user->name }}">
                               {{ $res->user->name }}</a>  {{ $res->created_at->diffForHumans() }} 
                           </small>
                       </p>
                       <p class="card-text">
                           {{ $res->excerpt }}
                       </p>
                       <a href="/feature/{{ $res->slug }}" class="btn btn-primary">read more</a>
                   </div>
               </div>
           </div>
           @endforeach
       </div>
   </div>    
@endsection