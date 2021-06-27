<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $guarded=[];
    public $timestamps = true;

    public function getStatus()
    {
        return $this->status == 0 ? ' غير مفعل' : ' مفعل';

    }
    public function getDescription()
    {
        return $this->description == '' ?'لايوجد وصف تعريفي':$this->description;

    }
    public function scopeStatus($query){
        return $query('status',1);
    }

    ######################### Start RelationShip #######################
    public function posts(){
      return  $this->hasMany(Post::class);
    }
    ######################### end RelationShip #######################

}
