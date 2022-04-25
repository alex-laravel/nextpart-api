<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

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
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function verify(Request $request)
    {
        $routeId = (string)$request->route('id');
        $routeHash = (string)$request->route('hash');
        $userId = (string)$request->user()->getKey();
        $userEmail = (string)$request->user()->getEmailForVerification();

        if (!hash_equals($routeId, $userId)) {
            throw new AuthorizationException;
        }

        if (!hash_equals($routeHash, generateVerificationHash($userEmail))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $this->verified($request);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        toast(trans('alerts.auth.verify.sent'), 'success');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        toast(trans('alerts.auth.verify.success'), 'success');

        return redirect($this->redirectPath());
    }
}
