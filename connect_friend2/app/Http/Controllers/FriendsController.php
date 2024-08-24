<?php

namespace App\Http\Controllers;

use App\Models\UserLIkeEachOtherModel;
use App\Models\UserLikeOtherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FriendsController extends Controller
{
    public function viewFriends()
    {
        $friendRequest = UserLikeOtherModel::where('to_id_user', '=', Auth::user()->id)->get();
        // dd($friendRequest);
        $likedPeople = UserLikeOtherModel::where('from_id_user', '=', Auth::user()->id)->get();
        $friends = UserLIkeEachOtherModel::where('id_user1', '=', Auth::user()->id)->get();

        return view('friends', compact('friendRequest', 'likedPeople', 'friends'));
    }

    public function removeFriend(Request $request)
    {
        $idRemove = $request->id_user2;

        $records = UserLIkeEachOtherModel::where('id_user2', $idRemove)->orWhere('id_user1', $idRemove)->get();

        if ($records) {
            foreach ($records as $record) {
                $record->delete();
            }
        }

        return redirect()->back();
    }

    public function setVidcallLink(Request $request)
    {
        $record1 = UserLIkeEachOtherModel::where('id_user2', $request->currentId)
            ->where('id_user1', $request->friendId)
            ->first();
        $record2 = UserLIkeEachOtherModel::where('id_user1', $request->currentId)
            ->where('id_user2', $request->friendId)
            ->first();

        $record1->vidcall_url = $request->vidcall_url;
        $record1->save();

        $record2->vidcall_url = $request->vidcall_url;
        $record2->save();

        return redirect()->back();
    }
}
