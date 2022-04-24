<?php

namespace Tests\Feature\Auth;

use App\Models\User\User;
use App\Notifications\Auth\ResetPasswordNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use DatabaseTransactions;

    const ROUTE_AUTH_PASSWORD_RESET = '/auth/password/reset';
    const ROUTE_AUTH_PASSWORD_EMAIL = '/auth/password/email';

    /**
     * @return void
     */
    public function testForgotPasswordRoute()
    {
        $response = $this->get(self::ROUTE_AUTH_PASSWORD_RESET);

        $response->assertStatus(200);
        $response->assertViewIs('auth.passwords.email');
    }

    /**
     * @return void
     */
    public function testForgotPasswordRouteIfAuthenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(self::ROUTE_AUTH_PASSWORD_RESET);

        $response->assertStatus(302);
        $response->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @return void
     */
    public function testForgotPassword()
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->from(self::ROUTE_AUTH_PASSWORD_RESET)->post(self::ROUTE_AUTH_PASSWORD_EMAIL, [
            'email' => $user->email,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_PASSWORD_RESET);
        $response->assertSessionHasNoErrors();

        Notification::assertSentTo($user, ResetPasswordNotification::class);
    }

    /**
     * @return void
     */
    public function testForgotPasswordWithNotExistingEmail()
    {
        $user = User::factory()->make();

        $response = $this->from(self::ROUTE_AUTH_PASSWORD_RESET)->post(self::ROUTE_AUTH_PASSWORD_EMAIL, [
            'email' => $user->email,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_PASSWORD_RESET);
        $response->assertSessionHasErrors('email');
    }

    /**
     * @return void
     */
    public function testForgotPasswordWithInvalidEmail()
    {
        $response = $this->from(self::ROUTE_AUTH_PASSWORD_RESET)->post(self::ROUTE_AUTH_PASSWORD_EMAIL, [
            'email' => 'invalid-email',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_PASSWORD_RESET);
        $response->assertSessionHasErrors('email');
    }
}
