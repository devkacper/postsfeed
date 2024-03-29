<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Return data of specific post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->get()->first();

        return response([
            'status' => 200,
            'post' => [
                'id'            => $post->id,
                'title'         => $post->title,
                'content'       => $post->content,
                'author'        => $post->author,
                'created_at'    => $post->created_at,
                'updated_at'    => $post->created_at
            ]
        ]);
    }

    /**
     * Store post in database.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Post::create([
            'title'     => $request->title,
            'content'   => $request->content,
            'author'    => $request->author
        ]);

        return response([
            'status'    => 200,
            'message'   => __('alert.api.store-success')
        ]);
    }

    /**
     * Update data of specific post in database.
     *
     * @param Request $request
     * @param Post $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'author'    => $request->author
        ]);

        return response([
            'status'    => 200,
            'message'   => __('alert.api.update-success')
        ]);
    }

    /**
     * Delete data of specific post.
     *
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
        Post::where('id', $id)->get()->each->delete();

        return response([
            'status'    => 200,
            'message'   => __('alert.api.delete-success')
        ]);
    }
}
