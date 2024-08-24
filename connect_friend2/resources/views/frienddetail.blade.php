@extends('master')

@section('content')
    <div class="container mt-5">

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%">
                        <img src="{{ asset('images/' . $user->avatar->img_url) }}" class="img-fluid rounded-start"
                            style="width: 15rem">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body border">
                        <div class="card-header bg-primary text-white">
                            Detail
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Username : {{ $user->username }}</li>
                            <li class="list-group-item">Ig url : {{ $user->ig_url }}</li>
                            <li class="list-group-item">Mobile number : {{ $user->mobile_number }}</li>
                            <li class="list-group-item">Gender : {{ $user->gender }}</li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if (!$vidcall_url)
        <form method="POST" action="{{ route('setVidcallLink') }}">
            @csrf
            <div class="mb-3">
                <label for="inputVideoCallLink" class="form-label">Set Video Call Link</label>
                <input type="text" class="form-control" id="inputVideoCallLink" name="vidcall_url" placeholder="Input Video Call Link here">
                <input type="hidden" name="currentId" value="{{ Auth::user()->id }}">
                <input type="hidden" name="friendId" value="{{ $user->id }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @else
        <p>Video link : <a href="{{ $vidcall_url }}">{{ $vidcall_url }}</a></p>
        @endif
    @endsection
