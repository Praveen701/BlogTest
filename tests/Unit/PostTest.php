<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function form_exists(){
        $response = $this->get(route('user.posts.create'));

        $response->assertStatus(200)
            ->assertViewIs('user.posts.create')
            ->assertSee('Name')
            ->assertSee('Content')
            ->assertSee('Submit');
    }
    
    public function store_post()
    {
        $data = [
            'name' => 'test',
            'content' => 'test content',
        ];
        $this->assertDatabaseHas('posts');
        $response = $this->post(route('user.posts.create'), $data);

        $response->assertStatus(200);
    }

    public function update_post()
    {
        $data = [
            'name' => 'update test',
            'content' => 'update test content',
        ];
        $this->assertDatabaseHas('posts');
        $response = $this->post(route('user.posts.update'), $data);

        $response->assertStatus(200);
    }

}
