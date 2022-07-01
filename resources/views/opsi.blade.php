@extends('layouts/main')

@section('main')
    <main class="opsi">
      <h1 class="opsi-title">Pilih Opsi</h1>
      <div class="opsi-list">
        <a class="btn" href="/isi-data">ISI DATA</a>
        <a class="btn" href="/upload-berkas">UPLOAD BERKAS</a>
        <a class="btn" href="/unduh-surat">UNDUH SURAT</a>
        <a class="btn back" href="/dashboard">KEMBALI</a>
      </div>
    </main>
@endsection
    

