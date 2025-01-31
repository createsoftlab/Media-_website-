<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_post_id',
        'user_id',
        'comment',
        'approved'
    ];

    /**
     * Relationship with EventPost
     * An event comment belongs to an event post.
     */
    public function eventPost()
    {
        return $this->belongsTo(EventPost::class, 'event_post_id');
    }

    /**
     * Relationship with User
     * An event comment belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship with EventReply
     * An event comment can have many replies.
     */
    public function event_replies()
    {
        return $this->hasMany(EventReply::class, 'event_comment_id');
    }
}
