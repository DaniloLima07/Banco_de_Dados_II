<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.index'));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertViewHas('users');
    }

    public function testShow()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.show', ['id' => $user->id]));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertViewHas('user');
    }

    public function testCreate()
    {
        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function testEdit()
    {
        $user = User::factory()->create();

        $response = $this->get(route('users.edit', ['id' => $user->id]));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertViewHas('user');
    }

    public function testUpdate()
    {
        $user = User::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'password' => 'updatedpassword',
        ];

        $response = $this->put(route('users.update', ['id' => $user->id]), $data);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    public function testDestroy()
    {
        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', ['id' => $user->id]));

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
