<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmailController extends Controller
{
    public function index()
    {
        return view('emails.index');
    }

    public function create(): View
    {
        return view('emails.create');
    }

    public function store(StoreEmailRequest $request)
    {
        Auth::user()->emails()->create($request->validated());

        return redirect()->route('emails.index')->with('success', 'Email sent successfully!');
    }
}
