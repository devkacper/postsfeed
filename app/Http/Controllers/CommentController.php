<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Return comment view blade.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $comments = Comment::paginate(5);
        return view('comment', compact('comments'));
    }
}
