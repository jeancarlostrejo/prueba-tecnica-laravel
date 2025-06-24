<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        $countries = Country::all();
        return view('users.create', compact('countries'));
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
}
