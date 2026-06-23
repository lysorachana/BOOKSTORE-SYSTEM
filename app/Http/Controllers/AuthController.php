<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ១. បន្ថែម Function នេះដើម្បីបង្ហាញផ្ទាំង Form Login
    public function showLoginForm()
    {
        // កូដនេះនឹងទៅទាញយក File: resources/views/auth/login.blade.php មកបង្ហាញ
        return view('auth.login');
    }
    public function showRegister()
    {
        // វានឹងទៅទាញយក File: resources/views/auth/register.blade.php មកបង្ហាញ
        return view('auth.register'); 
    }
    public function showDashboard()
    {
        // វានឹងទៅទាញយក File: resources/views/dashboard.blade.php មកបង្ហាញ
        return view('dashboard'); 
    }
    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Function login និង logout របស់អ្នកដែលបានសរសេរពីមុនមក...
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login successfully!',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);

    }

    public function logout(Request $request)
    {
        // ទាញយក User បច្ចុប្បន្ន
        $user = $request->user();

        // ឆែកមើលថាបើមាន User មែន ទើបអនុញ្ញាតឲ្យហៅមុខងារ currentAccessToken()
        if ($user) {
            $user->currentAccessToken()?->delete();
            return response()->json(['message' => 'Logged out successfully']);
        }

        // បើគ្មាន User (ស្មើ null)
        return response()->json(['message' => 'No active session found'], 401);
    }
    public function profile(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'user' => $user,
            'message' => 'Profile retrieved successfully!',
        ], 200);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user,
        ], 201);
    }
}
