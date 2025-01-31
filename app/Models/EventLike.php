<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLike extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_post_id', 'liked'];


    public function Eventpost()
    {
        return $this->belongsTo(EventPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
