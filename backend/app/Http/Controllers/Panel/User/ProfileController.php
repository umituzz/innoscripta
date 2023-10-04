<?php

namespace App\Http\Controllers\Panel\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Services\User\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

/**
 * Class ProfileController
 */
class ProfileController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function profile()
    {
        return view('user.profile', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $this->userService->update(auth()->id(), $request);

        return redirect()->back();
    }
}
