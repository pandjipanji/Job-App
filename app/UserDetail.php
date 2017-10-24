<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id','birthdate','gender','phone','file','status'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
