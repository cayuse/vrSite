<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'token', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
