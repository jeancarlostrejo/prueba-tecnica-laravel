<?php

namespace App\Http\Controllers;

use App\enums\Rol;
use App\Http\Requests\StoreEmailRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class EmailController extends Controller
{
    public function index()
    {

        // if (Auth::user()->role === Rol::ADMIN->value) {
        //     $emails = DB::table('emails')->select('id', 'subject', 'destinatary', 'body', 'status', 'created_at')
        //         ->orderBy('emails.created_at', 'desc')->get();
        // } else {
        //     $emails = DB::table('emails')->where('user_id', Auth::user()->id)
        //         ->select('id', 'subject', 'destinatary', 'body', 'status', 'created_at')
        //         ->orderBy('created_at', 'desc');
        // }

        // dd($emails);


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

    public function data()
    {
        if (Auth::user()->role === Rol::ADMIN->value) {
            $emails = DB::table('emails')->select('id', 'subject', 'destinatary', 'body', 'status', 'created_at')
                ->orderBy('emails.created_at', 'desc');
        } else {
            $emails = DB::table('emails')
                ->select('id', 'subject', 'destinatary', 'body', 'status', 'created_at')
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc');
        }


        return DataTables::of($emails)
            ->addIndexColumn()
            ->editColumn('created_at', function ($email) {
                return Carbon::parse($email->created_at)->format('d/m/Y H:i');
            })
            ->make(true);
    }
}
