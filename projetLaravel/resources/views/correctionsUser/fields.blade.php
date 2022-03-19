<!-- Intitulet Field -->
<div class="form-group">
    {!! Form::label('intitulet', 'Intitulet:') !!}
    {!! Form::text('intitulet', null, ['class' => 'form-control','required']) !!}
</div>

<!-- File Field -->
<div class="form-group ">
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
<div class="form-group ">

    @if(Request::is('correctionsUser/*/edit*'))
        {!! Form::hidden('id_user',$correction->id_user, ['class' => 'form-control ' ]) !!}
    @else
        {!! Form::hidden('id_user',Auth::user()->id, ['class' => 'form-control ' ]) !!}
    @endif

</div>

<!-- Id Epreuve Field -->
<div class="form-group col-sm-6">
    @if(Request::is('correctionsUser/*/edit*'))
        {!! Form::hidden('id_epreuve', $correction->id_epreuve, ['class' => 'form-control']) !!}
    @else
        {!! Form::hidden('id_epreuve', $id_epreuve, ['class' => 'form-control ']) !!}
    @endif

</div>
