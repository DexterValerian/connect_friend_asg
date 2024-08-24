<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikeOtherModel extends Model
{
    use HasFactory;


    protected $table = "user_like_other";
    protected $guarded = [];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_id_user');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_id_user');
    }
}
