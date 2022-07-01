@extends('layouts/main')

@section('main')

    <main class="form">
      <a href="/"><img class="form-logo" src="assets/img/logo.png" alt="SSR's Logo" /></a>
      <h1 class="form-title">Sistem Surat Rujukan Online</h1>

      <form action="/login" method="post" autocomplete="off">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label"
            >Alamat Email</label
          >
          <input
            type="email"
            class="form-control input-color @error('email') is-invalid @enderror"
            name="email"
            id="exampleInputEmail1"
            aria-describedby="emailHelp" 
            autofocus
            required
            value="{{ old('email') }}"
          />
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <div id="emailHelp" class="form-text">
            Kami tidak akan pernah membagikan email anda.
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
        <button class="btn" type="submit" name="login">Log In</button>
        <p>Belum punya akun? <a href="/signup" class="">Buat Akun</a></p>
      </form>
    </main>
@endsection

