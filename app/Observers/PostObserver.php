<?php

namespace App\Observers;

use App\Models\CrudActions;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "retrieved" event.
     *
     * @param Post $post
     * @return void
     */
    public function retrieved(Post $post)
    {
        CrudActions::create([
            'object_type'   => get_class($post),
            'object_id'     => $post->id,
            'action'        => 'GET',
        ]);
    }

    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        CrudActions::create([
            'object_type'   => get_class($post),
            'object_id'     => $post->id,
            'action'        => 'POST',
        ]);
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        CrudActions::create([
            'object_type'   => get_class($post),
            'object_id'     => $post->id,
            'action'        => 'PUT',
        ]);
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        CrudActions::create([
            'object_type'   => get_class($post),
            'object_id'     => $post->id,
            'action'        => 'DELETE',
        ]);
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
