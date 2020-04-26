@extends('main')

@section('title','| All Post')


@section('content')

<div class="row">
    
    <div class="col-md-10">
        <h1>All posts</h1>
    </div>
    
    <div class="col-md-2">
        <a href="{{ route('posts.create')}}" class="btn btn-lg btn-primary btn-h1-spacing btn-block">Create New post</a>
    </div>
    
    <div class="col-md-12">
        <hr>
    </div>
    
</div> <!-- End of row 1 -->

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ substr($post->title, 0, 200) }}{{ strlen($post->title) > 200 ? "...":"" }}</td>
                    <td>{{ substr($post->body, 0, 400) }}{{ strlen($post->body) > 400 ? "...":""}}</td>
                    <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                    <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-block">View</a><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-block">Edit</a>
                <tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>

@stop