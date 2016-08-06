<?php

namespace App\Models;

use Baum\Node;

class Category extends Node
{
    protected $dates = ['created_at,updated_at'];

    protected $guarded = array('id');

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
