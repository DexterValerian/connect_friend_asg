<?php

namespace App\Http\Controllers;

use App\Models\UserLIkeEachOtherModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function viewPersonDetail($id){
        $user = User::find($id);

        // dd($user);
        return view('persondetail', compact('user'));
    }

    public function viewFriendDetail($id){
        $user = User::find($id);

        // dd($user);

        $vidcall_url = UserLIkeEachOtherModel::where('id_user2', $id)->where('id_user1', Auth::user()->id)->first();

        if($vidcall_url->vidcall_url){
            $vidcall_url = $vidcall_url->vidcall_url;
        }
        else{
            $vidcall_url = null;
        }

        return view('frienddetail', compact('user', 'vidcall_url'));
    }
}
