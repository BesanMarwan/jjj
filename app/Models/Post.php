<?php

namespace App\Models;

use Facade\Ignition\Exceptions\UnableToShareErrorException;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

     protected $guarded=[];



     ########################### Start RelationShip #############################
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function approved_comments()
    {
        return $this->hasMany(Comment::class)->whereStatus(1);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class);
    }
    ########################### end RelationShip #############################
}
