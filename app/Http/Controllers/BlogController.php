<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View {
        return view('blog.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    /**
     * @return View
     */
    public function create() {
        return view('blog.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CreatePostRequest $request) {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show', $post)->with('success', "L'article $post->title a bien été sauvegardé");
    }

    /**
     * @param Post $post
     * @return RedirectResponse|View
     */
    public function show(Post $post): RedirectResponse | View
    {
        return view('blog.show', [
            'post' => $post
        ]);
    }

}
