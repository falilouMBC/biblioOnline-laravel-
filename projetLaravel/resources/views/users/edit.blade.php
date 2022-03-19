@extends('layouts.base')

@section('content')
    <div class="container-fluid my-5">
        <div class="row justify-content-center mb-5">
            <div class="col-6 col-lg-3">
                <h1 class="text-dark fw-bold fs-1 text-center py-5"></h1>

                @include('adminlte-templates::common.errors')



                {!! Form::model($myUser, ['route' => ['profilUpdate', $myUser->id], 'method' => 'get']) !!}


                <div class="form-group col-sm-6">
                    <div class="form-check">
                        {!! Form::hidden('is_newsletter', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('is_newsletter', '1', null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('is_newsletter', 'Is Newsletter', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    <div class="form-check">
                        {!! Form::hidden('is_fromEsmt', 0, ['class' => 'form-check-input']) !!}
                        {!! Form::checkbox('is_fromEsmt', '1', null, ['class' => 'form-check-input']) !!}
                        {!! Form::label('is_fromEsmt', 'Is Fromesmt', ['class' => 'form-check-label']) !!}
                    </div>
                </div>

                <div class="form-group flex justify-content-center mt-3">
                    {!! Form::submit('Valider changement', ['class' => 'btn btn-outline-dark mr-5']) !!}
                    <a href="{{ route('profil') }}" class="btn btn-danger">Cancel</a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
@endsection
