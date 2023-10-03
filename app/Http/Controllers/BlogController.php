<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BlogController extends Controller
{
    public function index(): Paginator{
        return Post::paginate(25);
    }

    public function show(): RedirectResponse | Post
    {
        $post = Post::findOrFail(1);
        if ($post->slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        return $post;
    }
}
