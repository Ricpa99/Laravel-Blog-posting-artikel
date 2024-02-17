@extends('dashboard.layout.main')

@section('container')
<head>
   
</head>
<div class="container">
   <div class="row justify-content-center my-4">
      <div class="col-md-10">
         <h2 class="mb-3">My post</h2>
         <h4 class="mb-2"> {{ $post->title }}</h4>
        
            <a href="/dashboard/post/{{ $post->title }}/edit" class="btn btn-warning"title="Edit"><i class="fa fa-pencil"></i> Edit</a>
            <form action="/dashboard/post/{{ $post->title }}" method="post" class="d-inline">
               @method('delete')
               @csrf
               <button class="btn bg-danger " href="" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure?')">
                   <i class="fa fa-close color-danger"></i> Delete
               </button>
            </form>
      
            @if($post->image)
            <div>
               <img style="max-height: 350px; min-width:100%;"  class="img-fluid my-4" src="{{asset('storage/' . $post->image)}}" alt="{{ $post->category->nama }}">
               </div>     
            @else     
            <img class="img-fluid mt-4" src="https://source.unplas.com/1200x400/?{{ $post->category->nama }}" alt="{{ $post->category->nama }}">
            @endif
            <article class="fs-6 mt-3">
               {!! $post->body !!}</p>
            </article>
            <a class="btn btn-primary" href="/dashboard/post">back</a>
      </div>
   </div>
</div>
<p>
@endsection