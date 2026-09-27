<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    private array $roles = ['admin', 'doctor', 'receptionist'];

    public function allUsers(Request $request)
    {
        $role = $request->query('role');

        $users = User::when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', [
            'users' => $users,
            'role' => $role,
            'title' => 'Users',
            'routeName' => 'users',
        ]);
    }

   

    public function create(Request $request)
    {
        return view('admin.users.form', [
            'user' => null,
            'role' => $request->query('role'),
            'roles' => $this->roles,
            'title' => 'Create User',
            'routeName' => 'users',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'], 
            'role' => ['required', Rule::in($this->roles)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(Request $request, User $user)
    {
        return view('admin.users.form', [
            'user' => $user,
            'role' => $user->role,
            'roles' => $this->roles,
            'title' => 'Edit User',
            'routeName' => 'users',
        ]);
    }

    public function update(Request $request, User $user)
    {
        $role = $this->role($request);

        abort_if($request->route('role') && $user->role !== $role, 404);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::in($this->roles)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        $routeName = $request->route('role') ? $this->routeName($role) : 'users';

        return redirect()
            ->route('admin.' . $routeName . '.index')
            ->with('success', $this->singleTitle($role) . ' updated successfully.');
    }

    public function destroy(Request $request, User $user)
    {
        $role = $request->route('role');
 
        if (auth()->id() === $user->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.'); 
    }

    private function role(Request $request): string
    {
        $role = $request->route('role');

        if (! $role && $request->route('user') instanceof User) {
            $role = $request->route('user')->role;
        }

        abort_unless(in_array($role, $this->roles, true), 404);

        return $role;
    }

    private function routeName(string $role): string
    {
        return match ($role) {
            'admin' => 'admins',
            'doctor' => 'doctors',
            'receptionist' => 'receptionists',
        };
    }

    private function title(string $role): string
    {
        return match ($role) {
            'admin' => 'Admin Management',
            'doctor' => 'Doctor Management',
            'receptionist' => 'Receptionist Management',
        };
    }

    private function singleTitle(string $role): string
    {
        return match ($role) {
            'admin' => 'Admin',
            'doctor' => 'Doctor',
            'receptionist' => 'Receptionist',
        };
    }
}