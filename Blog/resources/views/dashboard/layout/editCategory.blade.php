@extends('dashboard.layout.main')

@section('container')
<div class="container-fluid mt4">
   <div class="col-lg-12">
      @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
      <h1 class="h2">Edit Catgeory</h1>
      <div class="col-lg-8">
         <form action="/dashboard/categories/{{ $category->slug }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
               <label for="title" class="form-label">Title</label>
               <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $category->title) }}"  name="title" id="title">
               @error('title')
               <div class="invalid-feedback">
               {{ $message }}
               </div>
               @enderror
            </div>
            <div class="mb-3">
               <label for="title" class="form-label">Slug</label>
               <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $category->slug) }}"  name="slug" id="title">
               @error('title')
               <div class="invalid-feedback">
               {{ $message }}
               </div>
               @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit category</button>
         </form>
      </div>
   </div>
 </div> 
@endsection