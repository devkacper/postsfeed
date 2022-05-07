<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Return data of specific comment.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $comment = Comment::where('id', $id)->get()->first();

        return response([
            'status' => 200,
            'post' => [
                'id' => $comment->id,
                'post_id' => $comment->post_id,
                'content' => $comment->content,
                'author' => $comment->author,
                'created_at' => $comment->created_at,
                'updated_at' => $comment->created_at
            ]
        ]);
    }

    /**
     * Store comment in database.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->author = $request->author;
        $comment->save();

        return response([
            'status' => 200,
            'message' => __('alert.api.store-success')
        ]);
    }

    /**
     * Update data of specific comment in database.
     *
     * @param Request $request
     * @param Comment $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, Comment $id)
    {
        $id->update([
            'post_id' => $request->post_id,
            'content' => $request->content,
            'author' => $request->author
        ]);

        return response([
            'status' => 200,
            'message' => __('alert.api.update-success')
        ]);
    }

    /**
     * Delete data of specific comment.
     *
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        Comment::where('id', $id)->delete();

        return response([
            'status' => 200,
            'message' => __('alert.api.delete-success')
        ]);
    }
}
