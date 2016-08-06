<?php

namespace App\Models;

//使用了软删除
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends BaseModel
{
    use SoftDeletes;

    protected $guarded = ['id', 'user_id'];

    protected $hidden = ['deleted_at', 'attachable_type', 'attachable_id'];

    public function attachable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function syncFile($filepath)
    {
        if (\App::environment('local')) {
            return $filepath;
        }

        $filesystem = \Storage::disk('qiniu');

        if (!\Storage::disk('public')->exists($filepath)) {
            return;
        }

        $file = \Storage::disk('public')->get($filepath);

        try {
            $filesystem->put($filepath, $file);
        } catch (Exception $e) {
            return;
        }

        return ltrim($filepath, '/');
    }
}
