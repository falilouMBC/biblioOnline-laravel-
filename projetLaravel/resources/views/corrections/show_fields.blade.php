<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $correction->id }}</p>
</div>

<!-- Intitulet Field -->
<div class="col-sm-12">
    {!! Form::label('intitulet', 'Intitulet:') !!}
    <p>{{ $correction->intitulet }}</p>
</div>

<!-- File Field -->
<div class="col-sm-12">
    {!! Form::label('file', 'File:') !!}
    <p>{{ $correction->file }}</p>
</div>

<!-- Id User Field -->
<div class="col-sm-12">
    {!! Form::label('id_user', 'Id User:') !!}
    <p>{{ $correction->id_user }}</p>
</div>

<!-- Id Epreuve Field -->
<div class="col-sm-12">
    {!! Form::label('id_epreuve', 'Id Epreuve:') !!}
    <p>{{ $correction->id_epreuve }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $correction->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $correction->updated_at }}</p>
</div>

