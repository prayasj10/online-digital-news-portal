<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded=[];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function author()
    {
        return $this->hasOne(Author::class);
    }
}
