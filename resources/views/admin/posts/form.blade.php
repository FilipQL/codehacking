<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group row">
    <div class="col-md-12">
        {!! Form::label('category_id', 'Category:') !!}
    </div>
    <div class="col-md-4">
        {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class '=> 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

{{-- 'image_file' je samo naziv inputa. 'image_name' je naziv atributa/kolone u bazi. --}}
<div class="form-group">
    {!! Form::label('image_file', 'Photo:') !!}
    {!! Form::file('image_file', ['id' => 'image_file']) !!}
</div>