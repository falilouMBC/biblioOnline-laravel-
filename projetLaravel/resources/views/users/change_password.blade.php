@extends('layouts.base')

@section('content')
    <div class="container-fluid my-5">
        <div class="row justify-content-center mb-5">
            <div class="col-6 col-lg-3">
                <div class="container mt-5">
                    <div class="row">
                        @include('flash::message')
                    </div>
                </div>
                <h1 class="text-dark fw-bold fs-1 text-center py-5">Password update</h1>

                @include('adminlte-templates::common.errors')



                {!! Form::model($myUser, ['route' => ['passwordUpdate', $myUser->id], 'method' => 'get']) !!}
                @csrf
                <div class="form-group my-2">
                    {!! Form::label('password', 'Ancien password :') !!}
                    <input type="password" name="password" required class="form-control col-12">
                </div>

                <div class="form-group my-2">
                    {!! Form::label('password1', 'New password :') !!}
                    <input type="password" name="password1" required class="form-control col-12">
                </div>
                <div class="form-group my-2">
                    {!! Form::label('password', 'confirmer password :') !!}
                    <input type="password" name="password2" required class="form-control col-12">

                </div>


                <div class="form-group flex justify-content-center mt-3">
                    {!! Form::submit('Valider changement', ['class' => 'btn btn-outline-dark mr-5']) !!}
                    <a href="{{ route('profil') }}" class="btn btn-danger">Cancel</a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
@endsection
