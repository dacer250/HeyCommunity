<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends BaseModel
{
    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}