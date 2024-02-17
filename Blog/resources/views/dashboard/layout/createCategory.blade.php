@extends('dashboard.layout.main')

@section('container')
<div class="container-fluid mt4">
   <div class="col-lg-12">
      <h1 class="h2">Create New Category</h1>
      <div class="col-lg-8">
         <form action="/dashboard/categories" method="post" enctype="multipart/form-data">
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
               <label for="title" class="form-label">Slug</label>
               <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"  name="slug" id="title">
               @error('title')
               <div class="invalid-feedback">
               {{ $message }}
               </div>
               @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create category</button>
         </form>
      </div>
   </div>
 </div> 
@endsection