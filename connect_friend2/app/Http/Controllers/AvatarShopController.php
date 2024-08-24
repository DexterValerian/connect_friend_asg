<?php

namespace App\Http\Controllers;

use App\Models\UserAvatarListModel;
use Illuminate\Http\Request;
use App\Models\AvatarModel;
use Illuminate\Support\Facades\Auth;

class AvatarShopController extends Controller
{
    public function viewAvatarShop(){

        $ownedAvatar = UserAvatarListModel::where('id_user', '=',Auth::user()->id)->pluck('id_avatar');
        $avatars = AvatarModel::where('id','!=','1')
        ->whereNotIn('id',$ownedAvatar)
        ->get();
        return view('avatarshop', compact('avatars'));
    }

    public function purchaseAvatar(Request $request ){

        $user = Auth::user();

        if($user->wallet>=$request->price){
            $user->wallet -= $request->price;
            $user->save();
            UserAvatarListModel::create([
                'id_user'=>Auth::user()->id,
                'id_avatar'=>$request->id_avatar,
                'is_owned'=>1
            ]);
        }





        // dd($avatars);
        return redirect()->back();
    }
}
