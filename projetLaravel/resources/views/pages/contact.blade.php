@extends('..//layouts.base')
@section('title')
    Contact-Us
@endsection
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-5">
            <div class="col-6 col-lg-3">
                <h1 class="text-dark fw-bold fs-1 text-center py-5 mt-5 mb-3">Contact Us</h1>
                 @if($message)
                <div class="alert alert-primary" role="alert">
                    <strong>{{$message}}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
