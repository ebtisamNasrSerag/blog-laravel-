<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
    protected $fillable = [
    	 'body' ,'post_id'
    ];


    public function post()
    {
    	return $this->belongsTo(Post::Class);
    }
    public function user()
    {
    	return $this->belongsTo(User::Class);
    }
}
