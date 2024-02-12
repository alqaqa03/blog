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
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" value="{{old('title')}}">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <label for="discription" class="form-label">Description</label>
            <textarea type="text"
                      class="form-control"
                      id="description"
                      name="description"
                      required
            >{{old('discription')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="posts" class="form-label">Post Creator</label>
            <select class="form-control" name="post_creator" required>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection('content')
