@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">

        <h2 class="page-header">Confirm Deletion:</h2>

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
            <p class="alert alert-danger">Do you want to delete user '{{ $user->name }}'?</p>
            {!! Form::submit('Yes, delete this user', ['class' => 'btn btn-danger']) !!}
            <a href="{{ route('admin.users.index') }}" class="btn btn-success">No, get me out of here!</a>
        {!! Form::close() !!}

    </div>
@endsection