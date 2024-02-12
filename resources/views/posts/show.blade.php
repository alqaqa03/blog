@extends('layouts.app')
@section('title')show @endsection
@section('content')
      <div>
        <div class="card">
            <div class="card-header">
              Post info
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <p class="card-text">{{ $post->description }}</p>
            </div>
          </div>
      </div>
      <div>
        <div class="card mt-2">
            <div class="card-header">
              Post creator info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name: {{$post->user ? $post->user->name : "not found"}}</h5>
              <p class="card-text">email: {{$post->user ? $post->user->email : "not found"}}</p>
              <p class="card-text">created_at: {{$post->user ? $post->user->created_at->toDateString() : "not found"}}</p>
            </div>
          </div>
      </div>
@endsection('content')
