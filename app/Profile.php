<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title', 'user_id', 'description', 'url', 'image'
    ];

    public function linked()
    {
        return $this->belongsToMany(User::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
