@extends('navbar.navbar')
@section('container')
<h3 class="mb-5 text-end">Halaman blog {{ $title }}</h3>
<div class="row mb-3 justify-content-end">
    <div class="col-md-3">
        <form action="/home">
            @if (request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
            @endif
            @if (request('authors'))
                <input type="hidden" name="authors" value="{{ request('authors') }}">
            @endif
            <div class="input-group mb-3">
                <input placeholder="search by title" type="text" class="form-control" placeholder="{{ request('search') }}" name="search">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
@if ($model->count())
    <div class="card mb-3">
        @if($model[0]->image)
        <div>
           <img style="max-height: 340px; min-width:100%;"  class="img-fluid" src="{{asset('storage/' . $model[0]->image)}}" alt="{{ $model[0]->category->title }}">
           </div>     
        @else     
        <img class="img-fluid mt-4" src="https://source.unplas.com/1200x400/?{{ $model[0]->category->title }}" alt="{{ $model[0]->category->title }}">
        @endif
        <div class="card-body text-center" >
            <h2> <a class="card-title text-dark text-decoration-none" href="/post/{{ $model[0]->title }}">{{ $model[0]->title }}</a></h2>
        by xample: <a class="text-decoration-none" href="/home?authors={{ $model[0]->user->name }}"> {{ $model[0]->user->name }}</a> in 
        <a class="text-decoration-none" href="/home?kategori={{ $model[0]->category->slug }}">{{ $model[0]->category->title }}</a> {{ $model[0]->created_at->diffForHumans() }}
            <p class="card-text">{{ $model[0]['excerpt'] }}</p>
            <a class=" btn btn-primary text-decoration-none" href="/post/{{ $model[0]->title }}">read more</a>
        </div>
    </div>
<div class="container mb-3">
    <div class="row">
        @foreach ($model->skip(1) as $post) 
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="text-white bg-dark px-3 py-2 position-absolute"><a class="text-decoration-none text-white" href="/home?kategori={{ $post->category->title }}">{{ $post->category->title }}</a></div>
                @if($post->image)
       
           <img style="max-height: 340px; min-width:100%;"  class="img-fluid" src="{{asset('storage/' . $post->image)}}" alt="{{ $post->category->title }}">
          
        @else  
        <img class="card-img-top" src="https://source.unplas.com/500x400/?{{ $post->category->title }}" alt="{{ $post->category->title }}">
        @endif
                <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none text-dark" href="/post/{{ $post->title }}">{{ $post->title }}</a></h5>
                    <p>
                        <small class="text-muted">
                            by. <a class="tex-decoration-none" href="/home?authors={{ $post->user->name }}">
                            {{ $post->user->name }}</a>  {{ $post->created_at->diffForHumans() }} 
                        </small>
                    </p>
                    <p class="card-text">
                        {{ $post->excerpt }}
                    </p>
                    <a href="/post/{{ $post->title }}" class="btn btn-primary">read more</a>
                </div>
            </div>
        </div>
        @endforeach
     </div>
</div>
    @else 
<p class="text-center fs-4">Post not found 404</p>
@endif
{{ $model->links() }}
@endsection