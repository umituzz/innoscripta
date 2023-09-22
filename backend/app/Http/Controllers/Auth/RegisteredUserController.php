<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class RegisteredUserController
 * @package App\Http\Controllers\Auth
 */
class RegisteredUserController extends Controller
{
    private RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $this->registerService->registerAndLogin($request);

        return redirect(RouteServiceProvider::HOME);
    }
}
