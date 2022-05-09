<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $postRandomKey  = collect(Post::pluck('id'))->random();
        $faker          = Factory::create();

        $request = Request::create('/api/comment', 'POST', [
            'post_id'   => $postRandomKey,
            'content'   => $faker->realText,
            'author'    => $faker->name,
        ]);

        return app()->handle($request);
    }
}
