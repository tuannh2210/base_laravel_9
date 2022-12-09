<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    public function test_login_success()
    {
        $user = User::factory()->create();
        $response = $this->post(route('api.login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_validate_login()
    {
        $user = User::factory()->create();

        $response = $this->post(route('api.login'), [
            'email' => $user->email,
        ]);

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'errors' => [
                    'password',
                ],
            ]);
    }

    public function test_invalid_password()
    {
        $user = User::factory()->create();

        $response = $this->post(route('api.login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJsonStructure([
                'message',
            ]);
    }
}
