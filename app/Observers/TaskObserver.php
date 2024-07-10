<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Str;

class TaskObserver
{
    public function creating(Task $admin)
    {
        $admin->uuid = (string) Str::uuid();
    }
}
