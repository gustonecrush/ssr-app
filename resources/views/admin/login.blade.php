@extends('layouts/main')

@section('main')

    <main class="form">
      <a href="/"><img class="form-logo" src="{{ asset('assets/img/logo.png') }}" alt="SSR's Logo" /></a>
      {{-- <h1 class="form-title">ADMIN</h1> --}}
      <h1 class="form-title">Sistem Surat Rujukan Admin</h1>

      <form action="/admin/login" method="post" autocomplete="off">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label"
            >Username</label
          >
          <input
            type="text"
            class="form-control input-color @error('username') is-invalid @enderror"
            name="username"
            id="username"
            aria-describedby="emailHelp" 
            autofocus
            required
            value="{{ old('username') }}"
          />
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div id="emailHelp" class="form-text">
            Kami tidak akan pernah membagikan email Anda.
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input
            type="password"
            class="form-control input-color"
            name="password"
            id="exampleInputPassword1"
            required
          />
        </div>
        <button class="btn" type="submit" name="login">Masuk</button>
        <p>Masuk sebagai Pasien? <a href="/login" class="">Masuk</a></p>
      </form>
    </main>
@endsection

