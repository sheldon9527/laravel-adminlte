<?php

namespace App\Models;

//使用了软删除
// auth验证类别为eloquent，需要实现接口并使用trait
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel implements AuthenticatableContract
{
    use  Authenticatable;
}
