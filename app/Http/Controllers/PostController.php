<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Index page of posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('post.list', [
            'list' => Post::getList(),
        ]);
    }

    /**
     * Show post with revisions
     *
     * @param PostRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(PostRequest $request)
    {
        return view('post.item', [
            'item' => Post::getWithRevisions($request->getPostId()),
        ]);
    }
}
