@extends('master')

@section('payment', 'active')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-4">
        <div class="card mb-3 shadow-lg" style="max-width: 540px;">
            <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('images/coin.png') }}" class="img-fluid rounded-start " alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">Top Up your coin here!</h5>
                <p class="card-text">One click shall gain you 100 coins <br>Your coin now : {{ $coins }}</p>
                <form action="{{ route('topup') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Click Me!</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
