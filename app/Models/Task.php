<?php

namespace App\Models;

use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'assigned_by_id',
        'assigned_to_id'
    ];

    protected static function booted()
    {
        static::observe(TaskObserver::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(Admin::class, 'assigned_by_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }
}
