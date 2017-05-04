<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Votes extends BaseModel
{
    protected $table = "votes";

    public function posts()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    // function name is a singular since each post belongs to ONE user...
    public function user()
    {
        // links the foreign keys together 
        return $this->belongsTo('App\User', 'user_id');
    }

}
