@extends('layouts/main')

@section('main')
    <main class="daftar">
        <div class="form-daftar">
            <h1 class="daftar-title">Buat Akun</h1>
            <form action="/signup" method="post" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="namaDepan" class="form-label">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror" id="namaDepan" value="{{ old('nama_depan') }}" required>
                        @error('nama_depan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="namaBelakang" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" id="namaBelakang" value="{{ old('nama_belakang') }}" required>
                        @error('nama_belakang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div><br>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" id="confirmPassword" required>
                        @error('confirmPassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="NIK" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('NIK') is-invalid @enderror" name="NIK" id="NIK" value="{{ old('NIK') }}" required>
                        @error('NIK')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="noHP" class="form-label">No Telepon</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="noHP" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <button class="btn" type="submit" name="daftar">Buat Akun</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <img class="home-img-doctor" src="assets/img/doctor.png" />
    </main>

@endsection

