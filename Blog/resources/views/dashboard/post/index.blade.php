@extends('dashboard.layout.main')

@section('container')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12">
            
            @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <a class="btn btn-primary mb-3" href="/dashboard/post/create">Create new post</a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Edit</h4>
                    <div class="table-responsive"> 
                        <table class="table table-bordered table-striped verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $el)
                                    
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $el->title }}</td>
                                    <td>{{ $el->category->nama }}</td>
                                    <td>
                                        <span class="text-center">
                                            <a class="btn bg-info my-1" href="/dashboard/post/{{ $el->title }}" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye color-white"></i></a>
                                            <a class="btn bg-success my-1" href="/dashboard/post/{{ $el->title }}/edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-white m-r-5"></i></a>
                                            <form action="/dashboard/post/{{ $el->title }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <input type="hidden" name="oldImg" value="{{ $el->image }}">
                                                <button class="btn bg-danger border-0 my-1" href="" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-close color-danger"></i>
                                                </button>
                                            </form>
                                        </span>
                                   
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection