@extends('dashboard.layout.main')

@section('container')
<div class="container my-4">
    <h3>List Posts</h3>
    <div class="row">
        @foreach ($user as $post) 
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a class="text-decoration-none text-dark" href="/post/{{ $post->title }}">{{ $post->title }}</a></h5>
                    <p>
                        <small class="text-muted">
                            by. <a class="tex-decoration-none" href="/home?authors={{ $post->user->name }}">
                            {{ $post->user->name }}</a> <a class="tex-decoration-none" href=""></a> {{ $post->created_at->diffForHumans() }} 
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
     {{ $user->links() }}
</div>
@endsection