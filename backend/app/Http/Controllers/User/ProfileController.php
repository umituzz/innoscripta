<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Services\User\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

/**
 * Class ProfileController
 * @package App\Http\Controllers\User
 */
class ProfileController extends Controller
{
    private UserService $userService;

    /**
     * @param UserService $userService
     */
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
            'user' => auth()->user()
        ]);
    }

    /**
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $this->userService->update(auth()->id(), $request);

        return redirect()->back();
    }
}
