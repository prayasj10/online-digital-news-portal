<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardName extends Model
{
    protected $guarded=[];


    public function awardcategory()
    {
        return $this->belongsTo(AwardCategory::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
