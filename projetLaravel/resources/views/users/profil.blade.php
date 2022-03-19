@extends('..//layouts.base')
@section('title')
    Dashboard
@endsection
@section('css')
@endsection
@section('content')
    <h1>Profil  </h1>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="card shadow-xl mt-3 rounded col">
                <div class="p-2 text-center">
                    <span class="text-6xl"><i class="fa-solid fa-user"></i> </span>
                    <div class="card-body mt-3 info">
                        <h5 class="card-title"><strong>{{ Auth::User()->email }}</strong></h5>
                    </div>
                    <div class="container mt-5 mb-5"> @include('flash::message')</div>
                    <div class="col-5 mx-auto my-2">
                        <a href="{{ route('profilEdit',Auth::User()->id) }}" class="btn btn-outline-dark ">Modifier vos informations </a>
                    </div>
                    <div class="col-5 mx-auto">
                        <a href="{{ route('passwordEdit',Auth::User()->id) }}" class="btn btn-outline-dark ">Changer votre mot de passe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection

