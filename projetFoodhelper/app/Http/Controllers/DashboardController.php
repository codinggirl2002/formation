<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        return view('auth.dashboard', compact('user'));
    }
}
