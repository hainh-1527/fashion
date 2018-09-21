<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ChangePasswordUserRequest;
use App\Http\Requests\ChangeInfoUserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @param ChangeInfoUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeInfo(ChangeInfoUserRequest $request)
    {
        $user = $request->user();

        $user->update($request->only(['name', 'phone', 'address']));

        return redirect()->back()->with('success', __('update_success'));
    }

    /**
     * @param ChangePasswordUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordUserRequest $request)
    {
        $user = $request->user();

        $user->update($request->only('password'));

        return redirect()->back()->with('success', __('update_success'));
    }
}
