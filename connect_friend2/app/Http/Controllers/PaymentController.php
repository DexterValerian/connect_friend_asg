<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    //
    public function viewPayment(){
        // dd(Auth::user());
        $coins = Auth::user()->wallet;
        return view('payment', compact('coins'));
    }


    public function topup(){
        $user = Auth::user();
        $user->wallet+=100;
        $user->save();
        return redirect()->back();
    }
}
