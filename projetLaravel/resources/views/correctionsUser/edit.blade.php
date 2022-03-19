@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="row"> @include('flash::message')</div>
    </div>
    <div class="container rounded-5 w-50 bg-gray-100 shadow-xl rounded mt-5">
        <div class="row">
            <div class="col p-5 pb-0">
                <h1 class="fs-2 fw-bold text-center">Modifier la correction</h1>
            </div>
        </div>
        <div class="row px-5 py-0">
            <div class="col mt-5">

        @include('adminlte-templates::common.errors')


            {!! Form::model($correction, ['route' => ['correctionsUser.update', $correction->id], 'method' => 'patch', 'files' => true]) !!}


                    @include('correctionsUser.fields')

                <div class="form-group flex justify-content-center pt-3 pb-5">
                    {!! Form::submit('Save', ['class' => 'bg-green-600 btn btn-success col-4 mr-10']) !!}
                    <a href="{{route('corrections',$correction->id_epreuve)}}"  class="bg-red-600 btn btn-danger col-4">Cancel</a>
                </div>

            {!! Form::close() !!}

        </div>
        </div>
    </div>
@endsection
