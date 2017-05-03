<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $table = "posts";

    public static $rules = [
    	'title' => 'required|max:100',
    	'url' => 'required|url',
    	'content' => 'required',
    ];

    // function name is a singular since each post belongs to ONE user...
    public function user()
		{
			// links the foreign keys together 
			return $this->belongsTo('App\User', 'created_by');
		}

    public function votes()
    {
        return $this->hasMany('App\Models\votes', 'id');
    }
}
