<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $fillable=[
        'title','slug','summary',
    ];
}
