@extends('layouts/default')

@section('content')
<div class="col">
    <a href='/post' class="btn btn-outline-primary">Go Back</a>
    @if(!Auth::guest())
        @if(Auth::user() -> id == $post -> user_id)
        <form action='{{route('post.destroy', $post->id)}}' method='POST' class='float-end'>
            @csrf
            @method('DELETE')
            <div class="btn btn-group">
                <a href='{{route('post.edit', $post->id)}}' class="btn btn-primary">Edit Post</a>
                <input type='submit' value='Delete' class="btn btn-danger">
            </div>
        </form>
        @endif
    @endif
    <hr>
    <h1>{{$post->title}}</h1>
    <h2>{{$post->body}}</h2>
    <hr>
    <small>Created on - {{$post->created_at}}</small><br/>
    {!!(isset($post->updated_at)) ? 
        "<small> Updated on - $post->updated_at</small>" : '' 
    !!}
</div>

    @include('partials/comments')

@endsection