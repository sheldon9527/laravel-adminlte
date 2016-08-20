<?php

namespace App\Models;

class AdminDescription extends BaseModel
{
    public function user()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
