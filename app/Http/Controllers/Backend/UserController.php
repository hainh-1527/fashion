<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ChangeInfoUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.role.admin')->only(['edit', 'update']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $managers = User::ofRoleManager()
            ->latest()
            ->get();

        $users = User::ofRoleUser()
            ->latest()
            ->get();

        return view('backend.user.index', compact('managers', 'users'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * @param ChangeInfoUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ChangeInfoUserRequest $request, User $user)
    {
        $user->update($request->only(['name', 'phone', 'address']));

        return redirect()->route('user.index')->with('success', __('update_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProfile()
    {
        $user = Auth::user();

        return view('backend.user.my_profile', compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trash()
    {
        if (Auth::user()->role == 'admin') {
            $users = User::onlyTrashed()
                ->get();
        } else {
            $users = User::onlyTrashed()
                ->ofRoleUser()
                ->get();
        }

        return view('backend.user.trash', compact('users'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Request $request)
    {
        if (empty($request->users_id)) {
            return redirect()->route('user.trash')->with('warning', __('please_select_an_item'));
        }

        User::onlyTrashed()
            ->whereKey($request->users_id)
            ->restore();

        return redirect()->route('user.trash')->with('success', __('restore_success'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreAll()
    {
        User::onlyTrashed()
            ->restore();

        return redirect()->route('user.index')->with('success', __('restore_success'));
    }

    /**
     * @param $time
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreTime($time)
    {
        User::onlyTrashed()
            ->ofTimeSoftDelete($time)
            ->restore();

        return redirect()->route('user.trash')->with('success', __('restore_success'));
    }
}
