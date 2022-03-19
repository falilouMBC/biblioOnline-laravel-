
@extends('layouts.base')
@section('title')
@endsection
@section('css')
@endsection
@section('content')
    <div class="container pt-4">
        <div class="row bg-gray-100 my-5">
            <div class="col py-5 text-center text-zinc-900 text-3xl">
                <h1 class="text-slate-900">
                    Bienvenue sur <strong><i class="fa-solid fa-book"></i> eLibrary</strong> le meilleur moyen de préparer vos épreuves
                </h1>
            </div>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row row-cols-3 row-cols-lg-4">
                            @foreach($epreuves as $epreuve)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="card shadow-xl mt-3 rounded">
                                    <div class="align-items-center p-2 text-center">
                                        @if( $epreuve->matiere == "Java" )
                                            <img src="{{asset('images/java.png')}} " alt="" class="card-img-top rounded" width="160">
                                        @elseif($epreuve->matiere =="Java EE")
                                            <img src="{% static 'images/jee.png' %}" alt="" class="card-img-top rounded" width="160">
                                        @elseif($epreuve->matiere =="Django" )
                                            <img src="{{asset('images/django.png' )}}" alt="" class="card-img-top rounded" width="160">
                                        @elseif($epreuve->matiere == "Test et Logiciels" )
                                            <img src="{{asset( 'images/test_logiciel.png')}}" alt="" class="card-img-top rounded" width="160">
                                        @elseif($epreuve->matiere == "Php")
                                            <img src="{{asset( 'images/php.png')}}" alt="" class="card-img-top rounded" width="160">
                                        @elseif($epreuve->matiere == "Angular" )
                                            <img src="{{asset( 'images/angular.png' )}}" alt="" class="card-img-top rounded" width="160">
                                        @else
                                            <img src="{{asset( 'images/computer.png' )}}" alt="" class="card-img-top rounded" width="160">
                                        @endif
                                    <div class="card-body mt-3 info">
                                            <h5 class="card-title"><strong> Titre: </strong><strong>{{ $epreuve->intitulet }}</strong></h5>
                                            <p class="text-start"><strong> Matiere: </strong>
                                                {{ $epreuve->matiere }}</p>
                                            <p class="text-start"><strong>Filiere:</strong> {{$epreuve->filiere }} </p>
                                            <p class="text-start"> <strong><i class="fa-solid fa-chalkboard-user"></i></strong>
                                                {{ $epreuve->professeur }}</p>
                                            <div class="row my-3">
                                                <a href="{{ Route('readFileEpreuve', $epreuve->id) }}" class="btn-sm btn-outline-dark border-1 col-4 mr-3"><i class="fa-solid fas fa-eye "aria-hidden="true"></i> Voir</a>
                                                <a href="{{ Route('downloadEpreuve', $epreuve->id) }}" class="btn-sm btn-dark col-5"><i class="fa-solid fa-download" aria-hidden="true"></i> Télécharger</a>
                                            </div>
                                            @foreach($corrections as $correction)
                                            @if($correction->id_epreuve == $epreuve->id)
                                            <div class="row my-3">
                                                <a id="" class="btn-sm btn-outline-dark border-1" href="{{route('corrections' ,$correction->id_epreuve )}}" role="button">Afficher les Corrections</a>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection



