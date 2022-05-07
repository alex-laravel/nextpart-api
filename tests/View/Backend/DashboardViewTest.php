<?php

namespace Tests\View\Backend;

use App\Models\User\User;
use Tests\TestCase;

class DashboardViewTest extends TestCase
{
    const ROUTE_BACKEND_ADMIN = '/admin/dashboard';

    /**
     * @return void
     */
    public function testDashboardView()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(self::ROUTE_BACKEND_ADMIN);

        $response->assertStatus(200);
        $response->assertSee('class="sidebar ', false);
        $response->assertSee('class="sidebar-brand', false);
        $response->assertSee('class="sidebar-nav', false);
        $response->assertSee('class="sidebar-toggler', false);
        $response->assertSee('<header', false);
        $response->assertSee('<main', false);
        $response->assertSee('<footer', false);
    }
}
