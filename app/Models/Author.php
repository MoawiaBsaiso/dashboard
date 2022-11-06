<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    use HasFactory;
    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'author_categories', 'author_id', 'category_id', 'id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
