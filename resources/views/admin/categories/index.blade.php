@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <br>
        @include('partials.flash')
        @include('partials.errors')

        <h1 class="page-header">Categories</h1>

        <div class="col-sm-4">

            @if(isset($category))
                @include('admin.categories.edit')
            @else
                @include('admin.categories.create')
            @endif


        </div>




        <div class="col-sm-8">

            <div class="table-responsive">
                <table class="table table-hover table-responsive">
                    <thead>
                    <tr class="success">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if (count($categories) > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                <td colspan="2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a> |
                                    <a href="{{ route('admin.categories.confirm', $category->id) }}"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" align="center">There are no categories.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection