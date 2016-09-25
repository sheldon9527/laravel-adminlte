<?php

namespace App\Models;

class Picture extends BaseModel
{
    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable');
    }

    public function attachmentOne()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable')->first();
    }
    public function attachmentCount()
    {
        return $this->morphMany('App\Models\Attachment', 'attachable')->count();
    }
}
