<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id','title','Short_description','all_text','image','recycle'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
