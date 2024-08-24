@extends('master')

@section('content')
    <div class="container mt-5">

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%">
                        <img src="{{ asset('images/'.$user->avatar->img_url) }}" class="img-fluid rounded-start" style="width: 15rem">
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

                            {{-- "username" => "asdasdasd"
                            "password" => "$2y$12$3LDl2DoUeL6h8K3nnvL2de1T.fBB71hHEqTosKx9OpSuvE61lr0cu"
                            "ig_url" => "asdasd"
                            "mobile_number" => "123123"
                            "gender" => "Female"
                            "wallet" => 15013
                            "id_avatar" => 1
                            "set_visible" => "visible" --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
