<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ConfirmPasswordRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\RedirectResponse;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    /**
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param ConfirmPasswordRequest $request
     * @return RedirectResponse
     */
    public function confirm(ConfirmPasswordRequest $request)
    {
        $this->resetPasswordConfirmationTimeout($request);

        return redirect()->intended($this->redirectPath());
    }
}
