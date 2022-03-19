@extends('layouts.base')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('flash::message')
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row row-cols-3 row-cols-lg-4">
            @if(empty(sizeof($epreuves)))
                <div class="container mt-5 mb-5 mx-auto ">
                    <h1>Veuillez poster une epreuve svp...
                        <a href="{{ route('epreuvesUser.create') }}" class="btn btn-link"> poster epreuve</a>
                    </h1>
                </div>
            @endif
            @foreach($epreuves as $epreuve)

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card shadow-xl mt-3 rounded">
                        <div class="align-items-center p-2 text-center">
                            @if( $epreuve->matiere == "Java" )
                                <img src="{{asset('images/java.png')}} " alt="" class="card-img-top rounded"
                                     width="160">
                            @elseif($epreuve->matiere =="Java EE")
                                <img src="{% static 'images/jee.png' %}" alt="" class="card-img-top rounded"
                                     width="160">
                            @elseif($epreuve->matiere =="Django" )
                                <img src="{{asset('images/django.png' )}}" alt="" class="card-img-top rounded"
                                     width="160">
                            @elseif($epreuve->matiere == "Test et Logiciels" )
                                <img src="{{asset( 'images/test_logiciel.png')}}" alt="" class="card-img-top rounded"
                                     width="160">
                            @elseif($epreuve->matiere == "Php")
                                <img src="{{asset( 'images/php.png')}}" alt="" class="card-img-top rounded" width="160">
                            @elseif($epreuve->matiere == "Angular" )
                                <img src="{{asset( 'images/angular.png' )}}" alt="" class="card-img-top rounded"
                                     width="160">
                            @else
                                <img src="{{asset( 'images/computer.png' )}}" alt="" class="card-img-top rounded"
                                     width="160">
                            @endif
                            <div class="card-body mt-3 info">
                                <h5 class="card-title"><strong>
                                        Titre: </strong><strong>{{ $epreuve->intitulet }}</strong></h5>
                                <p class="text-start"><strong> Matiere: </strong>
                                    {{ $epreuve->matiere }}</p>
                                <p class="text-start"><strong>Filiere:</strong> {{$epreuve->filiere }} </p>
                                <p class="text-start"><strong><i class="fa-solid fa-chalkboard-user"></i></strong>
                                    {{ $epreuve->professeur }}</p>
                                <div class="row my-3">
                                    <a href="{{ Route('readFileEpreuve', $epreuve->id) }}"
                                       class="btn-sm btn-outline-dark border-1 col-4 mr-3" target="_blank"><i
                                            class="fa-solid fas fa-eye " aria-hidden="true"></i> Voir</a>
                                    <a href="{{ Route('downloadEpreuve', $epreuve->id) }}"
                                       class="btn-sm btn-dark col-5"><i class="fa-solid fa-download"
                                                                        aria-hidden="true"></i> Télécharger</a>
                                </div>
                                @if($epreuve->id_user == Auth::User()->id or Auth::User()->is_admin)
                                    {!! Form::open(['route' => ['epreuvesUser.destroy', $epreuve->id], 'method' => 'delete']) !!}
                                    <div class="row mb-3">
                                        <a href="{{ Route('epreuvesUser.edit', $epreuve->id) }}"
                                           class="btn-sm btn-warning col-4 mr-3">Update</a>

                                        {!! Form::button('<i class="far fa-trash-alt"></i> Delete', ['type' => 'submit', 'class' => 'btn-sm btn-outline-danger col-5', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    </div>
                                @endif
                                <div class="row my-3">
                                    <a id="" class="btn-sm btn-success my-2"
                                       href="{{ Route('addCorrection', $epreuve->id) }}" role="button">Ajouter
                                        correction</a>
                                    @foreach($corrections as $correction)
                                        @if($correction->id_epreuve == $epreuve->id)
                                            <a id="" class="btn-sm btn-outline-dark border-1"
                                               href="{{route('corrections' ,$correction->id_epreuve )}}" role="button">Afficher
                                                les Corrections</a>
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
@endsection
