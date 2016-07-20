@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">

        <h2 class="page-header">Confirm Deletion:</h2>

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
            <p class="alert alert-danger">Do you want to delete category '{{ $category->name }}'?</p>
            {!! Form::submit('Yes, delete this category', ['class' => 'btn btn-danger']) !!}
            <a href="{{ route('admin.categories.index') }}" class="btn btn-success">No, get me out of here!</a>
        {!! Form::close() !!}

    </div>
@endsection