<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded=[];

    public function status()
    {
        return $this->status == 1 ? 'اقرا' : 'جديد';
    }
}
