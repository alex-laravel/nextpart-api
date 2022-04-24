<?php

namespace Tests\Feature\Frontend;

use App\Models\User\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use DatabaseTransactions;

    const ROUTE_FRONTEND_HOME = '/';
    const ROUTE_AUTH_LOGIN = '/auth/login';
    const ROUTE_AUTH_EMAIL_VERIFY = '/auth/email/verify';

    /**
     * @return void
     */
    public function testHomeRoute()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(self::ROUTE_FRONTEND_HOME);

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
        $response->assertViewIs('backend.dashboard.index');
    }

    /**
     * @return void
     */
    public function testHomeRouteIfNotAuthenticated()
    {
        $response = $this->get(self::ROUTE_FRONTEND_HOME);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_LOGIN);

        $this->assertGuest();
    }

    /**
     * @return void
     */
    public function testHomeRouteIfNotVerified()
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->get(self::ROUTE_FRONTEND_HOME);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_EMAIL_VERIFY);

        $this->assertAuthenticatedAs($user);
    }
}
