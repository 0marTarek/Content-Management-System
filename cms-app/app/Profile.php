<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{
    protected $fillable= ['about', 'user_id', 'facebook', 'twitter', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
