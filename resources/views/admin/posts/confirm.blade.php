@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">

        <h2 class="page-header">Confirm Deletion:</h2>

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
            <p class="alert alert-danger">Do you want to delete user '{{ $post->title }}'?</p>
            {!! Form::submit('Yes, delete this post', ['class' => 'btn btn-danger']) !!}
            <a href="{{ route('admin.posts.index') }}" class="btn btn-success">No, get me out of here!</a>
        {!! Form::close() !!}

    </div>
@endsection