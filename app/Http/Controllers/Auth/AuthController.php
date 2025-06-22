<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PendaftaranHaji;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
    public function index()
    {
        return view('auth.login');
    }

    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only(
            'email',
            'password'
        );
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('Admin')) {
                return redirect()->intended('dashboard')
                    ->withSuccess('You have Successfully loggedin');
            } else {
                return redirect()->intended('/landing')
                    ->withSuccess('You have Successfully loggedin');
            }
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
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

        // dd($produk);
        if (Auth::check()) {
            return view('auth.dashboard', compact('produk', 'order', 'labels', 'data'));
        }

        return redirect("login")->withSuccess('Opps! 
        You do not have access');
    }

    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
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

    /** 
     * Write code on Method 
     * 
     * @return response() 
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
