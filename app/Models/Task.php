<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
