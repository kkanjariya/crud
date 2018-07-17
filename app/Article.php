<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Article extends Model
{

    protected $table = 'articles';
    

//    protected $fillable = ['title','description'];

    public function likes()
    {
        return $this->belongsToMany('App\User','likes');
    }
    public function like()
    {
        return $this->belongsTo(Like::class , 'user_id');
    }
}
