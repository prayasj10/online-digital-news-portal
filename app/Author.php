<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Author extends Model
{
    use LogsActivity;

    protected $fillable=[
        'name','facebook','twitter','published','position','country_id','city_id'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
