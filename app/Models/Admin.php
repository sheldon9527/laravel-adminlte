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

    public function description()
    {
        return $this->hasOne('App\Models\AdminDescription');
    }

    public function pictures()
    {
        return $this->hasMany('App\Models\Picture');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    public static function boot()
    {
        // 必须先继承原生引导方法 boot
        parent::boot();
        // 接下来开始设置事件绑定
        self::observe('App\Observers\AdminObserver');
    }
}
