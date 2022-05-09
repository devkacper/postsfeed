<?php

namespace Tests\Unit\Api;

use App\Models\Post;
use Faker\Factory;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Test of store Post data.
     *
     * @return void
     */
    public function testPostStore()
    {
        $faker = Factory::create();

        $data = [
            'title'     => $faker->text,
            'content'   => $faker->realText,
            'author'    => $faker->name,
        ];

        $response = $this->post('/api/post', $data);

        $this->assertDatabaseHas('posts', $data);

        $response->assertStatus(200);
    }

    /**
     * Test of retrieve Post data.
     *
     * @return void
     */
    public function testPostGet()
    {
        $postRandomKey = collect(Post::pluck('id'))->random();

        $response = $this->get('/api/post/'.$postRandomKey);

        $response->assertStatus(200);
    }

    /**
     * Test of update Post data.
     *
     * @return void
     */
    public function testPostUpdate()
    {
        $faker = Factory::create();

        $data = [
            'title'     => $faker->text,
            'content'   => $faker->realText,
            'author'    => $faker->name,
        ];

        $postRandomKey = collect(Post::pluck('id'))->random();

        $response = $this->put('/api/post/'.$postRandomKey, $data);

        $data['id'] = $postRandomKey;

        $this->assertDatabaseHas('posts', $data);

        $response->assertStatus(200);
    }

    /**
     * Test of delete Post data.
     *
     * @return void
     */
    public function testPostDelete()
    {
        $postRandomKey = collect(Post::pluck('id'))->random();

        $response = $this->delete('/api/post/'.$postRandomKey);

        $this->assertDatabaseMissing('posts', ['id' => $postRandomKey]);

        $response->assertStatus(200);
    }
}
