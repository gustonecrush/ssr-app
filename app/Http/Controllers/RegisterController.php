<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('signup', [
            "title" => "Sign Up",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_depan' => 'required|max:255',
            'nama_belakang' => ['required', 'min:1', 'max:255'],
            'email' => 'required|email|unique:pasiens',
            'password' => 'required|same:confirmPassword|min:8|max:255',
            'confirmPassword' => 'required|min:8|max:255',
            'NIK' => 'required|min:16|max:50',
            'no_hp' => 'required|min:11|max:15'
        ]);

        unset($validatedData["confirmPassword"]);
        // $validatedData["password"] = bcrypt($validatedData["password"]);
        $validatedData["password"] = Hash::make($validatedData["password"]);

        Pasien::create($validatedData);
        // $request->session()->flash('success', 'Please Login!');

        return redirect('/login')->with('success', 'Berhasil Buat Akun! Silahkan Masuk!');
    }
}
