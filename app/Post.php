<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//protected $table = 'posts';
    protected $fillable = [
    	'title', 'body' ,'url'
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::Class)->orderBy('created_at');
    }

    public function category()
    {
    	return $this->belongsTo(Category::Class);
    }

    public function likes()
    {
        return $this->hasMany(Like::Class);
    }
}
