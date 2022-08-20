<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('postCategory')) {
            $postCategory = PostCategory::firstwhere('slug', request('postCategory'));
            $title = ' in ' . $postCategory->name;
        }

        $pagination = Post::latest()->filter(request(['search', 'postCategory']))->paginate(4)->withQueryString();

        return view('blog', [
            'title' => 'Blog' . $title,
            'posts' => $pagination,
            'category' => PostCategory::all(),
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'category' => PostCategory::all(),
            'post' => $post
        ]);
    }
}
