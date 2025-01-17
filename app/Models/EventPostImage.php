<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPostImage extends Model
{
    use HasFactory;

    protected $fillable=[
        'event_post_id',
        'post_image1',
        'post_image2',
        'post_image3',
        'post_image4',
    ];

    public function EventPost()
    {
        return $this->belongsTo(EventPost::class);
    }
}
