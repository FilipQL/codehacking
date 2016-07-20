@extends('layouts.admin')

@section('content')
    
    <div class="col-lg-12">

        <h2 class="page-header">Edit Post</h2>
        
        <div class="col-sm-3">
            <img id="preview" class="img-thumbnail img-responsive" src="{{ $post->PostImagePath }}" alt="Photo">
            <br><br>
        </div>

        <div class="col-md-6 col-sm-9">

            @include('partials.errors')
    
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files' => true, 'autocomplete'=>"off"]) !!}
    
                @include('admin.posts.form')
    
                <div class="form-group">
                    {!! Form::submit('Edit Post', ['class'=>'btn btn-primary', 'name'=>'submit']) !!}
                </div>
    
            {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('skripte')
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_file").change(function(){
            readURL(this);
        });
    </script>
@endsection