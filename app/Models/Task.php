<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class Task extends Model
{
    protected $table = 'task';
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status_id',
        'level_id',
        'updated_by'
    ];

    public function level(){
        return $this->hasOne('App\Models\Level','id','level_id');
    }

    public function status(){
        return $this->hasOne('App\Models\Status','id','status_id');
    }

    public function user()
    {
    	return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function updatedBy()
    {
    	return $this->hasOne('App\Models\User', 'id', 'updated_by');
    }

    protected static function booted()
    {
        static::updated(function ($task) {
            if ($task->isDirty('status_id')) {
                $admins = \App\Models\User::where('role', 'admin')->get();
                Notification::send($admins, new \App\Notifications\TaskStatusUpdated($task));
            }
        });
    }

}
