<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceUser extends Model
{
    use SoftDeletes;

    protected $fillable = ['place_id', 'user_id', 'point'];
}
