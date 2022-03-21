<?php

namespace Tests\Feature\Backend;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DashboardPageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testPageDashboard()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Backend Page');
    }
}
