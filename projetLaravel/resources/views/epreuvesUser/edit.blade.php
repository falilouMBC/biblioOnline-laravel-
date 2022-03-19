@extends('layouts.base')

@section('content')
    <div class="container mt-5">
    <div class="row">@include('flash::message')</div>
    </div>
    <div class="container rounded-3 w-50 shadow-xl mt-5">
        <div class="row justify-content-center">
            <div class="col px-5">
                <h1 class="text-dark fw-bold fs-1 text-center py-5">Modifier l'épreuve</h1>

                @include('adminlte-templates::common.errors')
                @include('flash::message')


            {!! Form::model($epreuve, ['route' => ['epreuvesUser.update', $epreuve->id], 'method' => 'patch', 'files' => true]) !!}

                    @include('epreuvesUser.fields')

            <div class="form-group flex justify-content-center pt-3 pb-5">
                {!! Form::submit('POSTER', ['class' => 'bg-green-600 btn btn-success col-4 mr-10']) !!}
                <a href="{{ route('home') }}"  class="bg-red-600 btn btn-danger col-4">Cancel</a>
            </div>

            {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
