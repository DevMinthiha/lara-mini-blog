@extends('master')
@section('title', 'Post | Create')
@section('header', 'Create New Post')
@section('content')
    <div class="card p-4" style="width: 600px">
        @if(session()->has('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-4">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
                @error('title') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <div class="form-group my-4">
                <label for="desc">Description</label>
                <textarea name="desc" id="" cols="30" rows="5" class="form-control"></textarea>
                @error('desc') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <div class="form-group my-4">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-secondary">create</button>
        </form>
    </div>
@endsection