@extends('master')

@section('settings', 'active')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-4">
        <div class="card mb-3 shadow-lg" style="max-width: 540px;">
            <div class="row g-0">
                @if (Auth::user()->set_visible == 'visible')
                    <div class="col-md-4">
                        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%">
                            <img src="{{ asset('images/eyeclosed.jpg') }}" style="width: 5rem" class="img-fluid rounded-start "
                                alt="...">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Hide Your Profile</h5>
                            <p class="card-text">This will hide your current profile and make you invisible from new users
                                with
                                the cost of 50 coins. You will need 5 coins to unhide</p>
                            <p class="card-text">Current coin : {{ Auth::user()->wallet }}</p>
                            <form action="{{ route('hideProfile') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Hide My Profile!</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%">
                            <img src="{{ asset('images/eyeopen.jpg') }}" style="width: 5rem"
                                class="img-fluid rounded-start " alt="...">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Unhide Your Profile</h5>
                            <p class="card-text">This will unhide your current profile and visibility to others. You need 5
                                coins to unhide</p>
                            <p class="card-text">Current coin : {{ Auth::user()->wallet }}</p>
                            <form action="{{ route('unhideProfile') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Unhide My Profile!</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
