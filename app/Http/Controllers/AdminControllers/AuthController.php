<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('Auth/Login');
    }
    function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        Session::flash('email', $request->email);
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user->role == 'admin') return redirect('Admin/Dashboard')->with('success', 'Login Berhasil');
            if ($user->role == 'pengguna') return redirect('Home')->with('success', 'Login Berhasil');
            // return redirect('Admin/Dashboard')->with('success', 'Login Berhasil');

        } else {
            return back()->with('danger', 'Login Gagal, Silahlan cek email dan password anda');
        }
    }
    function logout()
    {

        Auth::logout();

        return redirect('Home');
    }

    function forgotPassword()
    {
        return view('Auth/Login');
    }

    function register()
    {
        return view('Auth/Register  ');
    }

    function createAcount( Request $request)
    {
        Session::flash('nama_lengkap', $request->nama_lengkap);
        Session::flash('username', $request->username);
        Session::flash('email', $request->email);

        $request->validate([
            'nama_lengkap'=>'required',
            'username'=>'required|unique:user',
            'email'=>'required|email|unique:user',
            'password'=>'required|min:6',
        ], [
            'nama_lengkap.required'=> 'Nama Wajib Diisi',
            'username.required'=> 'Username Wajib Diisi',
            'username.unique' => 'Username Sudah Digunakan, Silahkan Masukkan Username Yang Lain',
            'email.required'=> 'Email Wajib Diisi',
            'email.email'=> 'Email Tidak Valid, Silahkan Masukkan Email Yang Valid',
            'email.unique'=> 'Email Sudah Pernah Digunakan, Silahkan Masukkan Email Yang Lain',
            'password.required'=> 'Password Wajib Diisi',
            'password.min'=> 'Minimum Password 6 Karakter',
        ]);

        // if ($request->fails()) {
        //     Session::flash('error', 'Terjadi kesalahan pada saat validasi input');
        //     return redirect()->back()->with('danger', 'Data gagal disimpan');
        // }


        $role = 'admin';
        
        $data =[
            'role' => $role,
            'nama_lengkap'=> $request->nama_lengkap,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);

        if(Auth::attempt(['nama_lengkap' => request('nama_lengkap'), 'username' => request('username'), 'email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user->role == 'admin') return redirect('Admin/Dashboard')->with('success', 'Login Berhasil');
            if ($user->role == 'pengguna') return redirect('Home')->with('success', 'Login Berhasil');
            // return redirect('Admin/Dashboard')->with('success','Register Berhasil');
        } else {
            return back()->withErrors('danger', 'Silahlan cek lagi! data yang dimasukan tidak valid'); 
        }

    }
}
