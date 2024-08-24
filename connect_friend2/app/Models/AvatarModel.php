<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvatarModel extends Model
{
    use HasFactory;

    protected $table = "avatar";
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'id_avatar');
    }

    public function userAvatars()
    {
        return $this->hasMany(UserAvatarListModel::class, 'id_avatar');
    }

}
