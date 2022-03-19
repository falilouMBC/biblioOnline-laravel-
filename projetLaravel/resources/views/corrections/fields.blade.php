<!-- Intitulet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('intitulet', 'Intitulet:') !!}
    {!! Form::text('intitulet', null, ['class' => 'form-control']) !!}
</div>

<!-- File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file', 'File:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Id User Field -->
<div class="form-group col-sm-6">

    @if(Request::is('corrections/*/edit*'))
        {!! Form::hidden('id_user',$correction->id_user, ['class' => 'form-control ' ]) !!}
    @else
        {!! Form::label('id_user', 'Id User:') !!}
        {!! Form::number('id_user',Auth::user()->id, ['class' => 'form-control ' ]) !!}
    @endif

</div>

<!-- Id Epreuve Field -->
<div class="form-group col-sm-6">
    @if(Request::is('corrections/*/edit*'))
        {!! Form::hidden('id_epreuve', $correction->id_epreuve, ['class' => 'form-control']) !!}
    @else
        {!! Form::label('id_epreuve', 'Id Epreuve:') !!}
        {!! Form::select('id_epreuve', $epreuves, null, ['class' => 'form-control custom-select']) !!}
    @endif

</div>
