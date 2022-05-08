<?php

namespace App\Jobs;

use Faker\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AddPostJob implements ShouldQueue
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
        $faker = Factory::create();

        $request = Request::create('/api/post', 'POST', [
            'title'     => $faker->title,
            'content'   => $faker->realText,
            'author'    => $faker->name,
        ]);

        return Route::dispatch($request);
    }
}
