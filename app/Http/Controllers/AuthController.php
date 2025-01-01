<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Try login using 'users' table first
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            return $this->redirectUserBasedOnRole($user);
        }

        // If not successful, try login using 'pendaftaran' table
        $userPendaftaran = Pendaftaran::where('email', $request->email)->first();

        if ($userPendaftaran && Hash::check($request->password, $userPendaftaran->password)) {
            session(['pendaftaran_user' => $userPendaftaran]);
            Auth::login($userPendaftaran); // Pastikan pengguna ini dianggap login

            // Simpan data siswa ke dalam sesi
            Session::put('siswa', $userPendaftaran);

            // Debugging untuk memastikan data disetel
            $siswa = Session::get('siswa');

            return redirect()->route('user.dashboard_user');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    private function redirectUserBasedOnRole($user)
    {
        switch ($user->role) {
            case 'pegawai':
                return redirect()->route('admins.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            default:
                return redirect()->route('user.dashboard_user');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
