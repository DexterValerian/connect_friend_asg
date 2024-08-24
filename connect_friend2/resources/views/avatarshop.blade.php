@extends('master')

@section('avatarshop', 'active')
@section('content')
<h5 class="alert alert-info d-flex justify-content-center" role="alert">
    AVATAR SHOP
  </h5>
<div class="container-fluid d-flex flex-wrap justify-content-center gap-2">
    @forelse ($avatars as $item)
    <div class="card" style="width: 18rem;">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%">
            <img src="{{ asset('images/'.$item->img_url) }}" class="card-img-top" style="width: 10rem" alt="...">
        </div>
        <div class="card-body">
          <p class="card-text text-center">Price : {{ $item->price }}</p>
        </div>
        <div class="container d-flex justify-content-center">
            {{-- <a href="#" class="btn btn-primary">Purchase</a> --}}
            <form action="{{ route('purchaseAvatar') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $item->id }}" name="id_avatar">
                <input type="hidden" value="{{ $item->price }}" name="price">
                <button type="submit" class="btn btn-primary">Purchase</button>
            </form>
        </div>
      </div>
    @empty
      Terima kasih telah berbelanja
    @endforelse
</div>
@endsection
