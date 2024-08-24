@extends('master')

@section('home', 'active')
@section('content')
@auth
<div class="alert alert-success alert-dismissible fade show" role="alert">
    You have {{ $friendRequest }} friend requests
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endauth
    <div class="container-fluid text-center mt-3">
        <div class="row">
            <div class="col-2 border border-primary">
                <h2>Gender</h2>
                <a class="btn btn-primary" href="{{ route('viewByGender', 'Male') }}" role="button">Male</a>
                <a class="btn btn-primary" href="{{ route('viewByGender', 'Female') }}" role="button">Female</a>
                <h2>Hobby</h2>
                <a class="btn btn-primary m-1" href="{{ route('viewByHobby', 'Sport') }}" role="button">Sport</a>
                <a class="btn btn-primary m-1" href="{{ route('viewByHobby', 'Traveling') }}" role="button">Traveling</a>
                <a class="btn btn-primary m-1" href="{{ route('viewByHobby', 'Reading') }}" role="button">Reading</a>
                <a class="btn btn-primary m-1" href="{{ route('viewByHobby', 'Game') }}" role="button">Game</a>
                <a class="btn btn-primary m-1" href="{{ route('viewByHobby', 'Watching') }}" role="button">Watching</a>
            </div>
            <div class="col">
                <div class="container-fluid d-flex flex-wrap gap-2">
                    @forelse ($users as $item)
                        @auth
                            @if (Auth::user()->id == $item->id)
                                @continue
                            @endif
                        @endauth

                            <div class="card border-dark" style="width: 18rem;">
                                <div class="container-fluid"><img src="{{ asset('images/' . $item->avatar->img_url) }}"
                                        class="card-img-top w-50" alt="..."></div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->username }}</h5>
                                    <p class="card-text">Gender : {{ $item->gender }}</p>
                                    @if (Auth::check())
                                        <div class="container-fluid d-flex gap-2 align-items-center justify-content-center">
                                            <a href="{{ route('personDetail', $item->id) }}" class="btn btn-primary">Detail</a>
                                            <form action="{{ route('likeOthers', [Auth::user()->id, $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary">Thumb Up</button>
                                            </form>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Thumb Up</a>
                                    @endif
                                </div>
                            </div>
                    @empty
                        Kosong
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
