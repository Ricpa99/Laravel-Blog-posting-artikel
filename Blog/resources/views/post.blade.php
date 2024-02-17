@extends('navbar.navbar')

@section('container')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-9">
         <h2 class="mb-3"> {{ $post->title }}</h2>
         <p>by  xample <a class="text-decoration-none" href="/home?authors={{ $post->user->name }}"> {{ $post->user->name }}</a> in 
                       <a class="text-decoration-none" href="/home?kategori={{ $post->category->slug }}">{{ $post->category->title }}</a>
          </p>
         @if($post->image)
         <div>
            <img style="max-height: 350px; min-width:100%;"  class="img-fluid my-4" src="{{asset('storage/' . $post->image)}}" alt="{{ $post->category->title }}">
            </div>     
         @else     
         <img class="img-fluid mt-4" src="https://source.unplas.com/1200x400/?{{ $post->category->title }}" alt="{{ $post->category->title }}">
         @endif
         <article class="fs-6">
            {!! $post->body !!}</p>
         </article>
         <a class="btn btn-primary" href="/">back</a>
      </div>
   </div>
</div>
<p>

@endsection