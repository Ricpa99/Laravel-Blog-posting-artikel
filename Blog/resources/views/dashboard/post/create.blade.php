@extends('dashboard.layout.main')

@section('container')
    <div class="container-fluid mt4">
      <div class="col-lg-12">
         <h1 class="h2">Create New Post</h1>
         <div class="col-lg-8">
            <form action="/dashboard/post" method="post" enctype="multipart/form-data">
               @csrf
               <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"  name="title" id="title">
                  @error('title')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                  @enderror
               </div>
               <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"  name="slug" id="slug">
                  @error('slug')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
               <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <select name="category_id" id="" class="form-select" value="{{ old('body') }}">
                     @foreach ($categories as $category)
                     @if (old('category_id') == $category->id)
                     <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                     @else
                     <option value="{{ $category->id }}">{{ $category->title }}</option>
                     @endif
                     @endforeach
                  </select>
               </div>
               <div class="mb-3">
                  <label for="image" class="form-label">Post Image</label>
                     <img class="img-preview img-fluid mb-3 col-sm-5">
                     <input class="mt-2 form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" style="cursor: pointer;" 
                     data-toogle="tooltip" title="select image" onchange="previewImg()">
                     @error('image')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
               </div>
               <div class="mb-3">
                  @error('body')
                      <p class="text-danger">
                        {{ $message }}
                      </p>
                  @enderror
                  <label for="" class="form-label">Body</label>
                  <textarea class="form-control"  name="body" id="" rows="9"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Create post</button>
            </form>
         </div>
      </div>
    </div>
@endsection