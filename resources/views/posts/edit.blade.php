@extends('layouts.app')
@section('title')
    creat
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.update',$post) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title'): $post->title}}" required>
        </div>
        <div class="mb-3">
            <label for="discription" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" required >{{old('description') ? old('description'): $post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="posts" class="form-label">Post Creator</label>
            <select class="form-control" name="post_creator">
                @foreach($users as $user)
                    <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection('content')
