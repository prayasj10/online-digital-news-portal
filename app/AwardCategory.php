<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardCategory extends Model
{
    protected $guarded=[];


    public function awardnames()
    {
        return $this->hasMany(AwardName::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
