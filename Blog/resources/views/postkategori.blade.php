@extends('navbar.navbar')

@section('container')
<h3 class="mb-5">Post category</h3>
<div class="container">
    <div class="row">
        @foreach ($kategori as $el)
            <div class="col-md-4" >
                <div class="card bg-dark text-white" style="max-height: 300px; min-height:300px;">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-4"><a class="nav-link text-decoration-none text-white" href="/home?kategori={{ $el->title }}">{{ $el->title }}</a></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection