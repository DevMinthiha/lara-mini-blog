@extends('master')
@section('title', 'Post | Edit')
@section('header', 'Edit Post')
@section('content')
    <div class="card p-4" style="width: 600px">
        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session()->has('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            <div class="form-group my-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <div class="form-group my-4">
                <label for="desc">Desc</label>
                <textarea name="desc" id="" cols="30" rows="5" class="form-control">{{ $post->desc }}</textarea>
                @error('desc') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <div class="form-group my-4">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                <img src='{{ asset("/images/$post->imgURL") }}' class="rounded mt-3" height="100px" alt="">
            </div>
            <button type="submit" class="btn btn-sm btn-secondary">update</button>
        </form>
    </div>
@endsection