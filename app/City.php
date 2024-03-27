<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded=[];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }
}
