<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable=[
        'post_id',
        'post_image1',
        'post_image2',
        'post_image3',
        'post_image4',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
