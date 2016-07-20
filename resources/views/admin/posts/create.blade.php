@extends('layouts.admin')

@section('content')

    <div class="col-lg-12">

        <h2 class="page-header">Create a New Post</h2>

        <div class="col-sm-3">
            <img id="preview" class="img-thumbnail img-responsive" src="#" alt="Photo">
            <br><br>
        </div>

        <div class="col-md-6 col-sm-9">


            @include('partials.errors')

            {!! Form::model($post = new \App\Post, ['url'=>'admin/posts', 'files' => true, 'autocomplete'=>"off"]) !!}

            @include('admin.posts.form')

            <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary', 'name'=>'submit']) !!}
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