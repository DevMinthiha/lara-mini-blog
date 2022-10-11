@extends('master')
@section('title', 'Post | All')
@section('header', 'All Posts')
@section('content')
    @if(session()->has('success'))
    <h5 class="alert alert-success">{{ session('success') }}</h5>
    @endif
    <div class="d-flex gap-5">
        @foreach ($posts as $post)
        <div class="card rounded overflow-hidden" style="width: 18rem;">
            <img src='{{ asset("/images/$post->imgURL") }}' height="200px" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ Str::substr($post->desc, 0, 60) }}...</p>
                <a href="{{ route('post.show', ['id' => $post->id]) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-5">{{ $posts->links() }}</div>
@endsection