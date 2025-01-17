<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'username',
        'pro_image',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'user_id'); // Assuming 'user_id' is the foreign key
    }

    public function eventPosts()
    {
        return $this->hasMany(EventPost::class, 'user_id'); // Assuming 'user_id' is the foreign key
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

     /**
     * Relationship with event comments.
     */
    public function eventComments()
    {
        return $this->hasMany(EventComment::class, 'user_id');
    }

    /**
     * Relationship with event replies.
     */
    public function eventReplies()
    {
        return $this->hasMany(EventReply::class, 'user_id');
    }

}
