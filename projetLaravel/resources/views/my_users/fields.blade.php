<!-- Email Field -->
<div class="form-group col-sm-6">
    @if(Request::is('myUsers/*/edit*'))
    @else
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    @if(Request::is('myUsers/*/edit*'))
    @else
        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
    @endif

</div>

<!-- Is Fromesmt Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_fromEsmt', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_fromEsmt', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_fromEsmt', 'Is Fromesmt', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Is Newsletter Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_newsletter', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_newsletter', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_newsletter', 'Is Newsletter', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Is Admin Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_admin', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_admin', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_admin', 'Is Admin', ['class' => 'form-check-label']) !!}
    </div>
</div>


<!-- Is Active Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_active', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_active', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_active', 'Is Active', ['class' => 'form-check-label']) !!}
    </div>
</div>

