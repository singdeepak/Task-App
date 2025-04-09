<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
