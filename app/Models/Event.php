<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_title',
        'description',
        'start_date',
        'end_date',
        'image',
        'status',
    ];

    public function eventPosts()
    {
        return $this->hasMany(EventPost::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
