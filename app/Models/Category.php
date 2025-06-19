<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    protected $fillable = ['name'];

    // Khai báo quan hệ: Category có nhiều Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
