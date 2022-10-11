@extends('master')
@section('title', 'Post | Show')
@section('header', 'Post Detail')
@section('content')
    <img src="{{ asset("images/$post->imgURL") }}" class="mb-4 rounded" alt="" width="400px" height="auto">
    <h4>{{$post->title}}</h4>
    <p>{{$post->desc}}</p>
    <strong class="d-block mb-4">{{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</strong>
    <div class="py-5">
        <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-success btn-sm">edit</a>
        <a href="{{ route('post.destroy', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">delete</a>
    </div>
    <p class="fw-bold">Comments</p>
    @foreach ($comments as $comment)
    <p>{{ $comment->comment }}</p>
    @endforeach
    <hr>
    <form action="{{ route('post.comment', ['id' => $post->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="comment" class="form-control border border-secondary" rows="3" style="width: 600px"></textarea>
        </div>
        <button class="btn btn-primary btn-sm my-3">submit</button>
    </form>
@endsection