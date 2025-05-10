<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ← ここが重要
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Place extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'tel',
        'class',
        'terminate',
        'group_id',
    ];

    protected $hidden = ['password'];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('point')
                    ->withTimestamps()
                    ->withTrashed();
    }
}
