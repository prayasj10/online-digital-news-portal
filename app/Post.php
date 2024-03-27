<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title','content','author_id','published','image','additionaltag','awardcategory_id','awardname_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function awardcategory()
    {
        return $this->belongsTo(AwardCategory::class);
    }

    public function awardname()
    {
        return $this->belongsTo(AwardName::class);
    }
}
