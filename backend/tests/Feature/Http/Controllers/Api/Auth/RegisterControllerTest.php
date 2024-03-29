<?php

namespace Tests\Feature\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\IntegrationBaseTestCase;

/**
 * Class RegisterControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Auth\RegisterController
 */
class RegisterControllerTest extends IntegrationBaseTestCase
{
    use WithFaker;

    public function test_register()
    {
        $password = bcrypt(123456789);
        $userData = [
            'name' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertJsonStructure([
            'statusCode',
            'data',
            'message',
        ]);
    }

    public function test_register_with_invalid_email()
    {
        $password = bcrypt('password123');
        $userData = [
            'name' => $this->faker->firstName,
            'email' => 'invalid_email',
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email',
                ],
            ]);
    }

    public function test_register_with_duplicate_email()
    {
        $existingUser = User::factory()->create();

        $password = bcrypt('password123');
        $userData = [
            'name' => $this->faker->firstName,
            'email' => $existingUser->email,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email',
                ],
            ]);
    }

    public function test_register_with_mismatched_passwords()
    {
        $password = bcrypt('password123');
        $userData = [
            'name' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password,
            'password_confirmation' => 'different_password',
        ];

        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'password',
                ],
            ]);
    }
}
