<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\View\View;

class DashboardController extends BackendController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
