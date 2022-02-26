<?php

namespace App\Model\user;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function posts()
    {
        return $this->belongsToMany('App\Model\user\Post','post_tags');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
