<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User\User;
use App\Repositories\Auth\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest');

        $this->userRepository = $userRepository;
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->only([
            'name',
            'email',
            'password'
        ]));

        return $this->registered($user);
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    private function registered($user)
    {
        event(new Registered($user));

        $this->guard()->login($user);

        return redirect($this->redirectPath());
    }

    /**
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->userRepository->create($data);
    }
}
