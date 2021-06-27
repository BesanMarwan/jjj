<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $guarded=[];

    ############################### Start RelationShip ############
    public function post(){
        $this->belongsTo(Post::class);
    }
   /* public function user(){
        $this->belongsTo(User::class);
    }*/
    ############################### End RelationShip ############
}
