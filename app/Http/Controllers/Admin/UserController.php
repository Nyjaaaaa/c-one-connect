<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::whereNotIn('id', [1])
            ->paginate(5)
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('admin.users.index')->with('message', 'User added successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('message', 'User deleted successfully.');
    }
}
