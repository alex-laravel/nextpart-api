<?php

namespace Tests\Feature\Backend;

use App\Models\User\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DashboardPageTest extends TestCase
{
    use DatabaseTransactions;

    const ROUTE_AUTH_LOGIN = '/auth/login';
    const ROUTE_AUTH_EMAIL_VERIFY = '/auth/email/verify';
    const ROUTE_BACKEND_ADMIN = '/admin';

    /**
     * @return void
     */
    public function testDashboardRoute()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(self::ROUTE_BACKEND_ADMIN);

        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
        $response->assertViewIs('backend.dashboard.index');
    }

    /**
     * @return void
     */
    public function testDashboardRouteIfNotAuthenticated()
    {
        $response = $this->get(self::ROUTE_BACKEND_ADMIN);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_LOGIN);

        $this->assertGuest();
    }

    /**
     * @return void
     */
    public function testDashboardRouteIfNotVerified()
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->get(self::ROUTE_BACKEND_ADMIN);

        $response->assertStatus(302);
        $response->assertRedirect(self::ROUTE_AUTH_EMAIL_VERIFY);

        $this->assertAuthenticatedAs($user);
    }
}
