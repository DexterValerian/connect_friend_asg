<?php

namespace App\Http\Controllers;

use App\Models\HobbyModel;
use App\Models\User;
use App\Models\UserAndHobbyModel;
use App\Models\UserLIkeEachOtherModel;
use App\Models\UserLikeOtherModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //

    public function viewHome()
    {
        $excludedUserIds = UserLikeEachOtherModel::pluck('id_user2');

        $users = User::where('set_visible', '=', 'visible')->whereNotIn('id', $excludedUserIds)->get();

        // dd($users);

        if (Auth::check()) {
            $friendRequest = UserLikeOtherModel::where('to_id_user', '=', Auth::user()->id)->count();
        } else {
            $friendRequest = 0;
        }

        // dd($friendRequest);
        return view('home', compact('users', 'friendRequest'));
    }

    public function viewByGender($gender)
    {
        // $usersId =

        if (Auth::check()) {
            $friendRequest = UserLikeOtherModel::where('to_id_user', '=', Auth::user()->id)->count();
        } else {
            $friendRequest = 0;
        }

        $users = User::where('users.gender', '=', $gender)->get();
        return view('home', compact('users', 'friendRequest'));
    }

    public function viewByHobby($hobby)
    {
        // dd($hobby);
        // $users = UserAndHobbyModel::select('*')
        // ->join('users', 'user_and_hobby.id_user', '=', 'users.id')
        // ->join('avatar', 'users.id_avatar','=','avatar.id')
        // ->where('user_and_hobby.hobby','=',$hobby)
        // ->get();
        if (Auth::check()) {
            $friendRequest = UserLikeOtherModel::where('to_id_user', '=', Auth::user()->id)->count();
        } else {
            $friendRequest = 0;
        }

        $users = UserAndHobbyModel::with(['user.avatar'])
            ->where('hobby', '=', $hobby)
            ->get();

        $users = $users->map(function ($users) {
            return $users->user;
        });
        // dd($users);
        return view('home', compact('users', 'friendRequest')); 
    }

    public function likeOthers($idFrom, $idTo)
    {
        $existingRequest = UserLikeOtherModel::where('from_id_user', $idTo)->where('to_id_user', $idFrom)->first();

        if ($existingRequest) {
            UserLIkeEachOtherModel::create([
                'id_user1' => $existingRequest->from_id_user,
                'id_user2' => $existingRequest->to_id_user,
            ]);
            UserLIkeEachOtherModel::create([
                'id_user1' => $existingRequest->to_id_user,
                'id_user2' => $existingRequest->from_id_user,
            ]);
            $existingRequest->delete();
        } else {
            UserLikeOtherModel::firstOrCreate([
                'from_id_user' => $idFrom,
                'to_id_user' => $idTo,
            ]);
        }

        // $table->foreignId('from_id_user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        // $table->foreignId('to_id_user')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
        return redirect()->back();
    }
}
