<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    // Model Comment.php
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

}
