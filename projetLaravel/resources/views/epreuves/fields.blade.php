<!-- Intitulet Field -->
<div class="form-group col-sm-6">
    {!! Form::label('intitulet', 'Intitulet:') !!}
    {!! Form::text('intitulet', null, ['class' => 'form-control']) !!}
</div>

<!-- Matiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matiere', 'Matiere:') !!}
    {!! Form::select('matiere', ['Java' => 'Java', 'Jee' => 'Jee', 'Django' => 'Django', 'Laravel' => 'Laravel', 'Autre' => 'Autre'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Filiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filiere', 'Filiere:') !!}
    {!! Form::text('filiere', null, ['class' => 'form-control']) !!}
</div>

<!-- Professeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('professeur', 'Professeur:') !!}
    {!! Form::text('professeur', null, ['class' => 'form-control']) !!}
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
    @if(Request::is('epreuves/*/edit*'))
        {!! Form::hidden('id_user',$epreuve->id_user, ['class' => 'form-control ' ]) !!}
    @else
        {!! Form::label('id_user', 'Id User:') !!}
        {!! Form::number('id_user',Auth::user()->id, ['class' => 'form-control ' ]) !!}
    @endif
</div>
