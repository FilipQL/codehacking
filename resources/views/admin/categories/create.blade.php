{!! Form::model($category = new \App\Category, ['url'=>'admin/categories', 'autocomplete'=>"off"]) !!}

@include('admin.categories.form')

<div class="form-group">
    {!! Form::submit('Create Category', ['class'=>'btn btn-primary', 'name'=>'submit']) !!}
</div>

{!! Form::close() !!}