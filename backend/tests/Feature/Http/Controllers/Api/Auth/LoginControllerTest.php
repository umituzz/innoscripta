<?php

namespace Tests\Feature\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Class LoginControllerTest
 * @package Tests\Feature\Http\Controllers\Api\Auth
 * @coversDefaultClass \App\Http\Controllers\Api\Auth\LoginController
 */
class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

//    public function test_login()
//    {
//        $user = User::factory()->create([
//            'password' => bcrypt(123456789)
//        ]);
//
//        $userData = [
//            'email' => $user->email,
//            'password' => '123456789',
//        ];
//
//        $response = $this->json('POST', '/api/login', $userData);
//
//        $response->assertStatus(200)
//            ->assertJsonStructure([
//                'statusCode',
//                'data'
//            ]);
//    }

    public function test_login_with_invalid_password()
    {
        $userData = [
            'email' => 'user@example.com',
            'password' => 'wrong_password',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(422)
            ->assertJson([
                'statusCode' => 422,
                'errors' => ['email' => __('The provided credentials are incorrect!')],
                'message' => __('Login Failed'),
            ]);
    }

    public function test_login_with_invalid_email()
    {
        $userData = [
            'email' => 'invalid_email@example.com',
            'password' => 'password123',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(422)
            ->assertJson([
                'statusCode' => 422,
                'errors' => ['email' => __('The provided credentials are incorrect!')],
                'message' => __('Login Failed'),
            ]);
    }

    public function test_login_with_nonexistent_user()
    {
        $userData = [
            'email' => 'nonexistent@example.com',
            'password' => 'password123',
        ];

        $response = $this->json('POST', '/api/login', $userData);

        $response->assertStatus(422)
            ->assertJson([
                'statusCode' => 422,
                'errors' => ['email' => __('The provided credentials are incorrect!')],
                'message' => __('Login Failed'),
            ]);
    }
}
