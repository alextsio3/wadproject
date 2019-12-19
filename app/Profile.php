<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'title', 'user_id', 'description', 'url', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $imagepath = ($this->image) ?  $this->image : '/profile/v6ldUpqOPnJqHaY54RpxTLMbIL3d93Eo8WlMyzs3.png';
        return '/storage/' . $imagepath;
    }

    public function linked()
    {
        return $this->belongsToMany(User::class);

    }
}
