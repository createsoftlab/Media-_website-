<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPostVideo extends Model
{
    use HasFactory;

    protected $fillable=[
        'event_post_id',
        'video1',
        'video2',
    ];

    public function EventPost()
    {
        return $this->belongsTo(EventPost::class);
    }
}
