@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-6 col-lg-3">
                    <h1 class="text-dark fw-bold fs-1 text-center py-5"></h1>
                    <form method="post" action="{{route('sendMail')}}">


                            @include('flash::message')

                        @csrf
                        <div class="form-group">
                            <label for="sujet">Sujet :</label>
                            <input type="text" name="subject" id="" class="form-control" placeholder="Sujet du mail" min="2" maxlength="30" required>
                        </div>
                        <div class="form-group">
                            <label for="Mail">Mail :</label>
                            <textarea class="form-control" name="body" id="" rows="10" min="2" maxlength="2000" placeholder="message..." required></textarea>
                        </div>
                        <div class="form-group flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-outline-dark mr-5">Send newsletter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
