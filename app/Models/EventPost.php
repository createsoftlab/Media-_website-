<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPost extends Model
{
    use HasFactory;

    protected $fillable= [
        'event_id',
        'event_title',
        'user_id',
        'title',
        'slug',
        'category',
        'feature_image',
        'content',
        'tags',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'deleted_by',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function EventPostVideo()
    {
        return $this->hasOne(EventPostVideo::class);
    }
    public function EventPostImage()
    {
        return $this->hasOne(EventPostImage::class);
    }
    public function Eventlikes()
    {
        return $this->hasMany(EventLike::class);
    }

    public function eventComments()
    {
        return $this->hasMany(EventComment::class, 'event_post_id');
    }

    /**
     * Relationship with EventReply.
     * An event post can have many replies through its comments.
     */
    public function eventReplies()
    {
        return $this->hasManyThrough(EventReply::class, EventComment::class, 'event_post_id', 'event_comment_id');
    }

}
