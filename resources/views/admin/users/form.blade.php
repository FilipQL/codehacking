<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $roles, null, ['id' => 'role_id', 'class '=> 'form-control', 'placeholder' => 'Choose...']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, ['id' => 'status', 'class '=> 'form-control']) !!}
</div>

{{-- 'image_file' je samo naziv inputa. 'image_name' je naziv atributa/kolone u bazi. --}}
<div class="form-group">
    {!! Form::label('profile_photo', 'Profile photo:') !!}
    {!! Form::file('profile_photo', ['id' => 'profile_photo']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Repeat Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>





