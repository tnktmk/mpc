<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Place extends Model
{
    public function users()
{
    return $this->belongsToMany(User::class)
                ->withPivot('point')
                ->withTimestamps()
                ->withTrashed();
}

}
