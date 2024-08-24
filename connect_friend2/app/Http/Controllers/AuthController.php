<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAndHobbyModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    public function createRegister(): View
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'set_visible' => 'required'
        ]);

        // dd($request->except('password_confirmation'));
        $regfee = $request->registration_fee;
        $minamount = 100000;

        if($regfee<$minamount){
            $lackingamount = $minamount - $regfee;

            return redirect()->back()->withErrors([
                'registration_fee' => "You are still underpaid $lackingamount"
            ])->withInput();
        } else{
            $request->registration_fee = 100 + $regfee - $minamount;
        }


        $data = $request->except(['password_confirmation', 'registration_fee', 'hobbies']);
        $data['wallet'] = $request->registration_fee;
        $data['id_avatar'] = 1;
        $user = User::create($data);


        Auth::login($user);

        foreach ($request->hobbies as $key => $hobby) {
            UserAndHobbyModel::create([
                'id_user'=>$user->id,
                'hobby'=>$hobby
            ]);
        }

        return redirect(route('home', absolute: false));
    }


    public function createLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function storeLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the dashboard or intended route
            return redirect()->intended(route('home'));
        }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
