<?php

namespace Tests\Unit\Api;

use App\Models\Comment;
use App\Models\Post;
use Faker\Factory;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * Test of store Comment data.
     *
     * @return void
     */
    public function testCommentStore()
    {
        $postRandomKey = collect(Post::pluck('id'))->random();

        $faker = Factory::create();

        $data = [
            'post_id'   => $postRandomKey,
            'content'   => $faker->realText,
            'author'    => $faker->name,
        ];

        $response = $this->post('/api/comment', $data);

        $this->assertDatabaseHas('comments', $data);

        $response->assertStatus(200);
    }

    /**
     * Test of retrieve Comment data.
     *
     * @return void
     */
    public function testCommentGet()
    {
        $commentRandomKey  = collect(Comment::pluck('id'))->random();

        $response = $this->get('/api/comment/'.$commentRandomKey);

        $response->assertStatus(200);
    }

    /**
     * Test of update Comment data.
     *
     * @return void
     */
    public function testCommentUpdate()
    {
        $postRandomKey      = collect(Post::pluck('id'))->random();
        $commentRandomKey   = collect(Comment::pluck('id'))->random();

        $faker = Factory::create();

        $data = [
            'post_id'   => $postRandomKey,
            'content'   => $faker->realText,
            'author'    => $faker->name,
        ];

        $response = $this->put('/api/comment/'.$commentRandomKey, $data);

        $data['id'] = $commentRandomKey;

        $this->assertDatabaseHas('comments', $data);

        $response->assertStatus(200);
    }

    /**
     * Test of delete Post data.
     *
     * @return void
     */
    public function testPostDelete()
    {
        $commentRandomKey = collect(Post::pluck('id'))->random();

        $response = $this->delete('/api/post/'.$commentRandomKey);

        $this->assertDatabaseMissing('posts', ['id' => $commentRandomKey]);

        $response->assertStatus(200);
    }
}
