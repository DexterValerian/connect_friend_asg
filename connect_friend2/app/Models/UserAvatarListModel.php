<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAvatarListModel extends Model
{
    use HasFactory;

    protected $table = "user_avatar_list";
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function avatar()
    {
        return $this->belongsTo(AvatarModel::class, 'id_avatar');
    }
}
