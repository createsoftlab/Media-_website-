<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_comment_id',
        'user_id',
        'reply',
    ];

    /**
     * Relationship with EventComment
     * A reply belongs to a comment.
     */
    public function comment()
    {
        return $this->belongsTo(EventComment::class, 'event_comment_id');
    }

    /**
     * Relationship with User
     * A reply belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
