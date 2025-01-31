<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function PostVideo()
    {
        return $this->hasOne(PostVideo::class);
    }
    public function PostImage()
    {
        return $this->hasOne(PostImage::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
