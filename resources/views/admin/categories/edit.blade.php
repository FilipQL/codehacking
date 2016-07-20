{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id], 'autocomplete'=>"off"]) !!}

@include('admin.categories.form')

<div class="form-group">
    {!! Form::submit('Update Category', ['class'=>'btn btn-primary', 'name'=>'submit']) !!}
    <a class="btn btn-success" href="{{ route('admin.categories.index') }}">Cancel</a>
</div>

{!! Form::close() !!}