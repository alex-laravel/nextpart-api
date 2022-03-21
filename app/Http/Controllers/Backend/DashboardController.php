<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
