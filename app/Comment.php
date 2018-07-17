<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    public function article()
//    {
//        return $this->belongsTo(Article::class , 'user_id');
//    }
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }

    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
}
