<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pasien;
use App\Models\Surat;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

date_default_timezone_set('Asia/Jakarta');

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "title" => "Dashboard",
            "pasien" => Pasien::first(),
            "surat" => Pasien::with('surats')->get(),
            "contents" => Content::all()
        ]);
    }

    public function opsi()
    {
        return view('opsi', [
            "title" => "Opsi",
            "pasien" => Pasien::first(),
            "contents" => Content::all()
        ]);
    }

    public function isi_data()
    {
        return view('isi-data',  [
            "title" => "Isi Data"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_pasien" => 'required|max:255',
            "pasien_id" => 'required',
            "no_bpjs" => 'required|max:50',
            "gender" => 'required',
            "ttl" => 'required',
            "umur" => 'required',
            "nama_ibu" => 'required',
            "nama_ayah" => 'required',
            "golongan_darah" => 'required',
            "pekerjaan" => 'required|max:150',
            "alamat" => 'required|max:255',
            "tgl_pembuatan" => 'required',
        ]);

        $validatedData["tgl_pembuatan"] = date('Y-m-d H:i:s', time());

        Surat::create($validatedData);

        // $request->session()->put('nama_depan', $request->nama_depan);

        return redirect('/upload-berkas')->with('success', 'Success! <br> Please Upload Documents!');
    }

    public function upload_berkas()
    {
        return view('upload-berkas',  [
            "title" => "Upload Berkas",
            "surat" => (Surat::where('pasien_id', auth()->user()->id)->get())->last()
        ]);
    }

    public function upload_data_berkas(Request $request)
    {
        $validatedData = $request->validate([
            'foto_ktp' => 'required|image|file|max:8024',
            'kartu_keluarga' => 'required|file|max:8024',
            'kartu_bpjs' => 'required|file|max:8024',
            'kartu_berobat' => 'required|image|file|max:8024',
            'suket_dokter' => 'required|file|max:8024'
        ]);

        if ($request->file('foto_ktp') && $request->file('kartu_keluarga') && $request->file('kartu_bpjs') && $request->file('kartu_berobat') && $request->file('suket_dokter')) {
            $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('upload');
            $validatedData['kartu_keluarga'] = $request->file('kartu_keluarga')->store('upload');
            $validatedData['kartu_bpjs'] = $request->file('kartu_bpjs')->store('upload');
            $validatedData['kartu_berobat'] = $request->file('kartu_berobat')->store('upload');
            $validatedData['suket_dokter'] = $request->file('suket_dokter')->store('upload');
        }

        // $surat = Surat::where('id', $request->id);
        // // 
        Surat::where([
            'id' => $request->id_surat,
            'pasien_id' => $request->id,
        ])->update($validatedData);

        return redirect('/unduh-surat')->with('success', "Success to Upload Documents!");
    }

    public function unduh_surat()
    {
        return view('unduh-surat',  [
            "title" => "Unduh Surat",
            "surat" => (Surat::where('pasien_id', auth()->user()->id)->get())->last()
        ]);
    }

    public function edit(Pasien $pasien)
    {
        return view('dashboard.edit', [
            'title' => 'Edit',
            'pasien' => Pasien::find(auth()->user()->id),
            "contents" => Content::all()
        ]);
    }

    public function update(Request $request)
    {
        $pasien = Pasien::find(auth()->user()->id);

        $rules = [
            'nama_depan' => "max:255",
            'nama_belakang' => "max:255",
            'NIK' => "max:17",
            'no_hp' => "max:15",
            'picture' => 'image|file|max:8024',
        ];

        if ($request->email != $pasien->email) {
            $rules['email'] = 'required|email|unique:pasiens';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('picture');
        }

        Pasien::where('id', auth()->user()->id)
            ->update($validatedData);

        return redirect('/dashboard')->with('success', "Success to Update Data");
    }

    public function pdf()
    {
        $surat = ((Surat::where('pasien_id', auth()->user()->id)->get())->last())->toArray();
        $pdf = \PDF::loadView('pdf', $surat);
        $name = "Surat_Rujukan_" . uniqid();
        return $pdf->download($name . '.pdf');
    }
}
