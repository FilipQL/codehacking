@extends('layouts.admin')

@section('content')

    <div class="col-lg-12">

        <h2 class="page-header">Create a New User</h2>

        <div class="col-sm-3">
            <img id="preview" class="img-thumbnail img-responsive" src="#" alt="Profile">
            <br><br>
        </div>

        <div class="col-md-6 col-sm-9">


            @include('partials.errors')

            {!! Form::model($user = new \App\User, ['url'=>'admin/users', 'files' => true, 'autocomplete'=>"off"]) !!}

            @include('admin.users.form')

            <div class="form-group">
                {!! Form::submit('Create User', ['class'=>'btn btn-primary', 'name'=>'submit']) !!}
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

        $("#profile_photo").change(function(){
            readURL(this);
        });
    </script>
@endsection