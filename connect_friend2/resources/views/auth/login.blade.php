@extends('auth.layout')
@section('content')

<div class="container">
    <h1 class="text-center">Login</h1>
    <form method="POST" action="{{ route('storeLogin') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <div class="container d-flex justify-content-center align-items-center flex-column "><button type="submit"
                class="btn btn-primary mb-2">Submit</button>
            <a href="{{ route('register') }}" class="mb-4">Belum punya akun?</a>
        </div>
    </form>

</div>

@endsection
