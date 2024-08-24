@extends('master')

@section('friends', 'active')
@section('content')
    {{-- Friend request --}}

    {{-- Liked People --}}

    {{-- Friends --}}

    <div class="container mt-5">
        <div class="accordion shadow-sm" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Friend Request
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex flex-wrap gap-2">

                        @forelse ($friendRequest as $item)
                            <div class="card border-dark" style="width: 18rem;">
                                <div class="container-fluid d-flex justify-content-center">
                                    <img src="{{ asset('images/' . $item->fromUser->avatar->img_url) }}"
                                        class="card-img-top w-50" alt="Avatar Image">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->fromUser->username }}</h5>
                                    <p class="card-text">Gender: {{ $item->fromUser->gender }}</p>
                                    <div class="container-fluid d-flex gap-2 align-items-center justify-content-center">
                                        <a href="{{ route('personDetail', $item->fromUser->id) }}" class="btn btn-primary">Detail</a>
                                        <form action="{{ route('likeOthers', [Auth::user()->id, $item->fromUser->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary">Thumb Up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            Kosong
                        @endforelse



                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Liked People
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex flex-wrap gap-2">

                        @forelse ($likedPeople as $item)
                            <div class="card border-dark" style="width: 18rem;">
                                <div class="container-fluid d-flex justify-content-center">
                                    <img src="{{ asset('images/' . $item->toUser->avatar->img_url) }}"
                                        class="card-img-top w-50" alt="Avatar Image">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->toUser->username }}</h5>
                                    <p class="card-text">Gender: {{ $item->toUser->gender }}</p>
                                    <div class="container-fluid d-flex gap-2 align-items-center justify-content-center">
                                        <a href="{{ route('personDetail', $item->toUser->id) }}" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            Kosong
                        @endforelse



                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Friends
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body d-flex flex-wrap gap-2">

                        @forelse ($friends as $item)
                            <div class="card border-dark" style="width: 18rem;">
                                <div class="container-fluid d-flex justify-content-center">
                                    <img src="{{ asset('images/' . $item->user2->avatar->img_url) }}"
                                        class="card-img-top w-50" alt="Avatar Image">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $item->user2->username }}</h5>
                                    <p class="card-text">Gender: {{ $item->user2->gender }}</p>
                                    <div class="container-fluid d-flex gap-2 align-items-center justify-content-center">
                                        <a href="{{ route('friendDetail', $item->id_user2) }}" class="btn btn-primary">Detail</a>
                                        <form action="{{ route('removeFriend') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id_user2 }}" name="id_user2">
                                            <button type="submit" class="btn btn-danger">
                                                Remove
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @empty
                            Kosong
                        @endforelse



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
