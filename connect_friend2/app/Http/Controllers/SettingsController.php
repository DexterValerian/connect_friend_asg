<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function viewSettings(){
        return view('settings');
    }

    public function hideProfile(){
        $user = Auth::user();
        $user->set_visible = 'hidden';
        $user->wallet -=50;
        $user->save();
        return redirect()->back();
    }

    public function unhideProfile(){
        $user = Auth::user();
        $user->set_visible = 'visible';
        $user->wallet -=5;
        $user->save();
        return redirect()->back();
    }
}
