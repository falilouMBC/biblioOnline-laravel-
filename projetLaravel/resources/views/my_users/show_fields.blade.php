<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $myUser->id }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $myUser->email }}</p>
</div>

<!-- Is Fromesmt Field -->
<div class="col-sm-12">
    {!! Form::label('is_fromEsmt', 'Is Fromesmt:') !!}
    <p>{{ $myUser->is_fromEsmt }}</p>
</div>

<!-- Is Newsletter Field -->
<div class="col-sm-12">
    {!! Form::label('is_newsletter', 'Is Newsletter:') !!}
    <p>{{ $myUser->is_newsletter }}</p>
</div>

<!-- Is Admin Field -->
<div class="col-sm-12">
    {!! Form::label('is_admin', 'Is Admin:') !!}
    <p>{{ $myUser->is_admin }}</p>
</div>

<!-- Is Active Field -->
<div class="col-sm-12">
    {!! Form::label('is_active', 'Is Active:') !!}
    <p>{{ $myUser->is_active }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $myUser->password }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $myUser->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $myUser->updated_at }}</p>
</div>

