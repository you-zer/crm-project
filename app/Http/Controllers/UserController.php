<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Services\Contracts\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(
        private readonly UserServiceInterface $service
    ) {}

    public function index(): View
    {
        $users = User::with('roles')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        $this->service->assignRole($user, $request->input('role'));

        return redirect()->route('users.index')->with('success', 'Role updated successfully.');
    }
}
