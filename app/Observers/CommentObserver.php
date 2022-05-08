<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\CrudActions;

class CommentObserver
{
    /**
     * Handle the Comment "retrieved" event.
     *
     * @param Comment $comment
     * @return void
     */
    public function retrieved(Comment $comment)
    {
        CrudActions::create([
            'object_type'   => get_class($comment),
            'object_id'     => $comment->id,
            'action'        => 'GET',
        ]);
    }

    /**
     * Handle the Comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        CrudActions::create([
            'object_type'   => get_class($comment),
            'object_id'     => $comment->id,
            'action'        => 'POST',
        ]);
    }

    /**
     * Handle the Comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        CrudActions::create([
            'object_type'   => get_class($comment),
            'object_id'     => $comment->id,
            'action'        => 'PUT',
        ]);
    }

    /**
     * Handle the Comment "deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        CrudActions::create([
            'object_type'   => get_class($comment),
            'object_id'     => $comment->id,
            'action'        => 'DELETE',
        ]);
    }

    /**
     * Handle the Comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
