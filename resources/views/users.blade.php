@extends('layouts/main')

@section('main')

    <main class="form" style="margin-top: 150px;">
      <a href="/"><img class="form-logo" src="assets/img/logo.png" alt="SSR's Logo" /></a>
      <h1 class="form-title">Sistem Surat Rujukan Online</h1>
      <h1 class="form-title">Masuk Sebagai</h1>
      <div class="button-users">
          <a href="/admin/login" class="btn btn-user">Admin</a>
          <a href="/login" class="btn btn-user">Pasien</a>
      </div>
    </main>
@endsection

