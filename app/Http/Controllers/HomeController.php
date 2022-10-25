<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function index() {
        $socials = Link::where('type', Link::SOCIAL)
            ->orderBy('order')
            ->get();
        $books = Link::where('type', Link::ORDER)
            ->orderBy('order')
            ->get();
        return view('index', compact('socials', 'books'));
    }

    public function logout() {
        Auth::logout();
        return redirect()
            ->route('index');
    }

    public function login() {
        $isUserExists = User::whereNotNull('email_verified_at')
            ->first();
        if (!$isUserExists) {
            $user = new User();
            $user->name = 'Icytwins Admin';
            $user->email = 'admin@icytwins.beauty';
            $user->password = Hash::make('icy');
            $user->email_verified_at = Carbon::now();
            $user->save();
        }
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $email = $request->input('email');
        $pass = $request->input('password');

        $user = User::where('email', $email)
            ->first();
        if (!$user) {
            return redirect()
                ->back()
                ->with([
                    'error' => 'Account not found'
                ]);
        }

        if (!Hash::check($pass, $user->password)) {
            return redirect()
                ->back()
                ->with([
                    'error' => 'Account not found'
                ]);
        }

        Auth::login($user);
        return redirect()
            ->route('admin.dashboard');
    }

}
