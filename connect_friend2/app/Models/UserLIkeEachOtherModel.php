<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLIkeEachOtherModel extends Model
{
    use HasFactory;


    protected $table = "user_like_each_other";
    protected $guarded = [];

    public function user1()
    {
        return $this->belongsTo(User::class, 'id_user1');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'id_user2');
    }
}
