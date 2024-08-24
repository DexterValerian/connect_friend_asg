@extends('auth.layout')
@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Register</h1>
        <form method="POST" action="{{ route('storeRegister') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                @if ($errors->has('username'))
                    <div class="text-danger">
                        {{ $errors->first('username') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password">
                @include('templates.danger', ['fieldName' => 'password'])
            </div>

            <div class="mb-3">
                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation">
                @include('templates.danger', ['fieldName' => 'password_confirmation'])
            </div>

            <div class="mb-3">
                <label for="ig_url" class="form-label">Instagram URL</label>
                <input type="text" class="form-control" id="ig_url" name="ig_url" value="{{ old('ig_url') }}">
            </div>

            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobile_number" name="mobile_number"
                    value="{{ old('mobile_number') }}">
            </div>


            <label for="gender" class="form-label">Gender</label>
            <div class="container-fluid">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="registration_fee" class="form-label">Registration Fee : 100,000 [Input pay amount]</label>
                <input type="number" class="form-control" id="registration_fee" name="registration_fee">
                @include('templates.danger', ['fieldName' => 'registration_fee'])
            </div>


            {{--
        $table->integer('wallet');
        $table->foreignId('id_avatar')->constrained('avatar')->cascadeOnDelete()->cascadeOnUpdate();
        $table->enum('set_visible', ['visible', 'hidden']);
        --}}

            {{-- start hobby --}}
            <div style="height: 10px"></div>
            <label>Hobby</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Sport" id="flexCheckDefault" name="hobbies[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Sport
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Traveling" id="flexCheckDefault" name="hobbies[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Traveling
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Reading" id="flexCheckDefault" name="hobbies[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Reading
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Game" id="flexCheckDefault" name="hobbies[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Game
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Watching" id="flexCheckDefault" name="hobbies[]">
                <label class="form-check-label" for="flexCheckDefault">
                    Watching
                </label>
            </div>

            {{-- end hobby --}}

            <div style="height: 30px"></div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="visible" id="flexCheckDefault" name="set_visible"
                    required>
                <label class="form-check-label" for="flexCheckDefault">
                    I allow people to see me
                </label>
            </div>

            <div class="container d-flex justify-content-center align-items-center flex-column">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                <a href="{{ route('login') }}" class="mb-4">Sudah punya akun?</a>
            </div>
        </form>

    </div>
@endsection
