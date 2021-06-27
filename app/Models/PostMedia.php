<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    protected $table = 'post_medias';

    protected $guarded =[];


    public function getImage(){
    return  URL::asset($this->file_name);
    }

    ###################### start RelationShip ##########
    public function post(){
        $this->belongsTo(Post::class);
    }
}
