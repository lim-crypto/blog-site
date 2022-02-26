<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function tags()
    {
        return $this->belongsToMany('App\Model\user\Tag','post_tags')->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany('App\Model\user\Category','category_posts')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
    public function likes(){
        return $this->hasMany('App\Model\user\Like');
    }
    // public function getSlugAttribute($value)
    // {
    //     return route('post', $value);
    // }
}
