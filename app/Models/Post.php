<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['post_category_id', 'user_id', 'title', 'slug', 'thumbnail', 'excerpt', 'body', 'published_at'];
    // protected $with = ['post_categories'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%') //mencari kata yg ada di dalam title
                    ->orWhere('body', 'like', '%' . $search . '%'); //mencari kata yg ada di dalam body
            });
        });

        $query->when($filters['postCategory'] ?? false, function ($query, $postCategory) {
            return $query->whereHas('PostCategory', function ($query) use ($postCategory) {
                $query->where('slug', $postCategory);
            });
        });
    }

    public function PostCategory() //harus sama dengan nama tabel
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
