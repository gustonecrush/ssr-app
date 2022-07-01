<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Content;
use App\Models\Pasien;
use App\Models\Surat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/dashboard', [
            "title" => "Dashboard",
            "active" => "dashboard",
            "surats" => Surat::all(),
            "pasiens" => Pasien::all(),
            "count_surat" => Surat::all()->count(),
            "count_pasien" => Pasien::all()->count(),
            "count_admin" => Admin::all()->count(),
        ]);
    }

    public function login()
    {
        return View('admin/login', [
            "title" => "Log In",
        ]);
    }

    public function authenticate_admin(Request $request)
    {

        // validate username and password
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // ddd($credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
            // dd('gagal');
            $request->session()->regenerate();
            return Redirect::intended('/admin')->with('success', 'Berhasil Masuk!');
        }

        return Redirect::intended('/admin/login')->with('toast_error', 'Gagal Masuk! <br> Username atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Keluar!');
    }

    public function surats()
    {
        return view('admin/surat', [
            "title" => "Surat Rujukan",
            "active" => "surat",
            "surats" => Surat::all(),
            "count" => Surat::all()->count()
        ]);
    }

    public function konfirm(Request $request)
    {
        $surat = Surat::find($request->id);
        if ($surat) {
            $surat->is_confirm = 1;
            $surat->save();
        }
        return redirect('/admin/surat-rujukan')->with('success', 'Surat Rujukan telah dikonfirmasi!');
    }

    public function pasiens()
    {
        return view('admin/pasien', [
            "title" => "Pasien",
            "active" => "pasien",
            "pasiens" => Pasien::all(),
            "count" => Pasien::all()->count()
        ]);
    }

    public function admin()
    {
        return view('admin/admin', [
            "title" => "Admin SSR",
            "active" => "admin",
            "admins" => Admin::all(),
        ]);
    }

    public function create()
    {
        return view('admin/create', [
            "title" => "Tambah Admin",
            "active" => "create",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:8|max:30|unique:admins',
            'password' => 'required|same:confirm_password|min:8|max:255',
        ]);

        unset($validatedData["confirm_password"]);
        $validatedData["password"] = Hash::make($validatedData["password"]);

        Admin::create($validatedData);

        return redirect('/admin/admin-ssr')->with('success', 'Admin baru telah ditambahkan!');
    }

    public function destroy(Request $request)
    {
        Admin::where('username', "=", $request->username)->delete();
        return redirect('/admin/admin-ssr')->with('success', 'Admin telah dihapus!');
    }

    public function delete_surat(Request $request)
    {
        Surat::where('id', "=", $request->id)->delete();
        return redirect('/admin')->with('success', 'Surat telah dihapus!');
    }

    public function delete_pasien(Request $request)
    {
        Pasien::where('id', "=", $request->id)->delete();
        return redirect('/admin')->with('success', 'Akun Pasien telah dihapus!');
    }

    public function delete_content(Request $request)
    {
        Content::where('id', "=", $request->id)->delete();
        return redirect('/admin/content')->with('success', 'Konten telah dihapus!');
    }

    public function rujukan($id)
    {
        $surat = Surat::where('id', $id)->get()->first();
        return view('admin/rujukan', [
            "title" => $surat->nama_pasien,
            "data" => $surat,
            "active" => "surat"
        ]);
    }

    public function content()
    {
        return view('admin/content', [
            "title" => "Konten Kesehatan",
            "active" => "content",
            "contents" => Content::all()
        ]);
    }

    public function create_content(Request $request)
    {

        $validatedData = $request->validate([
            "judul" => 'required|max:255',
            "url" => 'required|max:255',
            "thumbnail" => 'required|image|max:8024'
        ]);

        if ($request->file('thumbnail')) {
            $validatedData["thumbnail"] = $request->file('thumbnail')->store('content');
        }

        Content::create($validatedData);

        return redirect('/admin/content')->with('success', 'Berhasil membuat konten!');
    }
}
