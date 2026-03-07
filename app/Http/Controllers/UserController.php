<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    // Inject UserService via constructor
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Return all users as JSON
    public function show()
    {
        return response()->json($this->userService->listUsers());
    }

    // Display users in a view
    public function index()
    {
        $users = $this->userService->listUsers();
        return view('users.index', ['users' => $users]);
    }

    // Get the first user
    public function first()
    {
        return collect($this->userService->listUsers())->first();
    }

    // Get a user by ID
    public function get($id)
    {
        $user = collect($this->userService->listUsers())
            ->firstWhere('id', $id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}