<?php

namespace App\Models;

class Picture extends BaseModel
{
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable');
    }
}
