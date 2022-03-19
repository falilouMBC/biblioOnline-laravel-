<!-- Intitulet Field -->
<div class="form-group col-12">
    {!! Form::label('intitulet', 'Intitulet:') !!}
    {!! Form::text('intitulet', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Matiere Field -->
<div class="form-group ">
    {!! Form::label('matiere', 'Matiere:') !!}
    {!! Form::select('matiere', ['Java' => 'Java', 'Jee' => 'Jee', 'Django' => 'Django', 'Laravel' => 'Laravel', 'Autre' => 'Autre'], null, ['class' => 'form-control custom-select','required']) !!}
</div>


<!-- Filiere Field -->
<div class="form-group ">
    {!! Form::label('filiere', 'Filiere:') !!}
    {!! Form::text('filiere', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Professeur Field -->
<div class="form-group ">
    {!! Form::label('professeur', 'Professeur:') !!}
    {!! Form::text('professeur', null, ['class' => 'form-control','required']) !!}
</div>

<!-- File Field -->
<div class="form-group ">
    {!! Form::label('file', 'File:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file', 'Choose file', ['class' => 'custom-file-label','required']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Id User Field -->
<div class="form-group mb-3">
        {!! Form::hidden('id_user',Auth::user()->id, ['class' => 'form-control ','required' ]) !!}
</div>
