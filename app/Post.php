<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Post extends Model
{
    use Searchable;
    protected $guarded = ['created_at', 'updated_at'];

    protected $dates = [
        'published_at',
    ];

    public function searchableAs()
    {
        return 'users_index';
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}