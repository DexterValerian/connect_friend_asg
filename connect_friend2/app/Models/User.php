<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
    ];

    protected $table="users";
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function avatar()
    {
        return $this->belongsTo(AvatarModel::class, 'id_avatar');
    }

    public function hobbies()
    {
        return $this->hasMany(UserAndHobbyModel::class, 'id_user');
    }

    public function hasAvatars()
    {
        return $this->hasMany(UserAvatarListModel::class, 'id_user');
    }

    public function likesOtherUsers()
    {
        return $this->hasMany(UserLikeOtherModel::class, 'from_id_user');
    }

    public function likedByUsers()
    {
        return $this->hasMany(UserLikeOtherModel::class, 'to_id_user');
    }

    public function mutualLikes()
    {
        return $this->hasMany(UserLikeEachOtherModel::class, 'id_user1')->orWhere('id_user2', $this->id);
    }
}
