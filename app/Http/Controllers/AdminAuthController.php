<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Ajoutez cette ligne
use Illuminate\Validation\ValidationException;
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('particuliers.admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember') ? $request->boolean('remember') : true;

        // Tentative de connexion avec le garde admin et remember me
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            // Connexion réussie, redirection vers le tableau de bord
            return redirect()->intended(route('particuliers.admin.dashboard'));
        }

        // Connexion échouée, retour au formulaire avec un message d'erreur
        return redirect()->back()->withErrors([
            'email' => 'Identifiants invalides fournis.',
        ])->withInput();
    }

    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->attempt($request->only('email', 'password'));

        return redirect()->route('particuliers.admin.dashboard');
    }
    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('particuliers.admin.login.form');
    }
}
