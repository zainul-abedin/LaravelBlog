@extends('main')

@section('title','| create post')

@section('content')

<div class='row'>
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <hr>
       
        {!! Form::open(['route' => 'posts.store']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
                {{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
                
                {{ Form::label('body', 'Post Body:', ['class' => 'control-label']) }}
                {{ Form::textarea('body', null, array_merge(['class' => 'form-control'])) }}
            
                {{ Form::submit('Create Post', array_merge(['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px'])) }}
            </div>
        {!! Form::close() !!}
     
        
    </div>
</div>

@endsection

