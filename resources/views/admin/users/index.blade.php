@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <br>
        @include('partials.flash')
        @include('partials.errors')

        <h1 class="page-header">Users</h1>

        <div class="table-responsive">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr class="danger">
                        <th>Id</th>
                        <th>Profile Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Registered at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @if (count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img style="height:80px;max-width:80px;" src="{{ $user->ProfilePhotoPath }}" class="img-thumbnail"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                {{ $user->is_active == 1 ? 'Active' : 'Not Active'}}
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td colspan="2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a> |
                                <a href="{{ route('admin.users.confirm', $user->id) }}"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" align="center">There are no articles.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection