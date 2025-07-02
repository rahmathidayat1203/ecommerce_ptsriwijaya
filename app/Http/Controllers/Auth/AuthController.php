<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PendaftaranHaji;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');


    public function postRegistration(Request $request)
    {
        // ✅ Validasi input dengan konfirmasi password
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8', // ← ini wajib cocok dengan password_confirmation
        ]);

        // ✅ Simpan user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ✅ Assign role
        $role = Role::findByName('User');
        $user->assignRole($role);

        // ✅ Login otomatis
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registrasi berhasil dan Anda telah login!');
    }

 
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('Admin')) {
                return redirect()->intended('dashboard')
                    ->with('success', 'Login berhasil sebagai Admin!');
            } else {
                return redirect()->intended('/landing')
                    ->with('success', 'Login berhasil sebagai User!');
            }
        }

        return redirect("login")->with('error', 'Oops! Email atau password salah.');
    }

    public function dashboard()
    {
        $produk = Produk::count();
        $order = Order::count();

        $pendaftaranPerBulan = PendaftaranHaji::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"),
            DB::raw("COUNT(*) as total")
        )
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->get();

        $labels = $pendaftaranPerBulan->pluck('bulan');
        $data = $pendaftaranPerBulan->pluck('total');

        if (Auth::check()) {
            return view('auth.dashboard', compact('produk', 'order', 'labels', 'data'));
        }

        return redirect("login")->with('error', 'Oops! Anda tidak memiliki akses.');
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $role = Role::findByName("User");
        $user->assignRole($role->name);
        return $user;
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
