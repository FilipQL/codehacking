@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">
        <br>
        @include('partials.flash')
        @include('partials.errors')

        <h1 class="page-header">Posts</h1>

        <div class="table-responsive">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr class="success">
                        <th>Id</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @if (count($posts) > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                @if($post->post_image)
                                    <img style="height:80px;max-width:80px;" src="/{{ $post->PostImagePath }}" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ str_limit($post->body, 20) }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                            <td>{{ $post->updated_at->diffForHumans() }}</td>
                            <td colspan="2">
                                <a href="{{ route('admin.posts.edit', $post->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a> |
                                <a href="{{ route('admin.posts.confirm', $post->id) }}"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" align="center">There are no posts.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection