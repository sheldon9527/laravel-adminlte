<?php

namespace App\Models;

class Admin extends BaseModel
{
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
}
