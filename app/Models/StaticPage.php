<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class StaticPage extends Model
{
    use Sluggable;
    protected $table ="static_pages";
    protected $guarded=[];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
                ]
            ];
    }
}
