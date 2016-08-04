<?php

namespace App\Models;

//使用了软删除
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends BaseModel
{
    use SoftDeletes;
}
