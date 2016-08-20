<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\AdminDescription;

class AdminObserver
{
    public function created(Admin $user)
    {
        $description = new AdminDescription();
        $description->admin_id = $user->id;

        $description->save();
    }
}
