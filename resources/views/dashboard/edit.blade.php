{{-- {{ dd($pasien); }} --}}
@extends('layouts/main')

@section('main')
<div class="container mt-5">
    <div class="header-edit ms-5">
        <h1 class="dashboard-title">Edit Data</h1>
        <h3>{{ $pasien->nama_depan }} {{ $pasien->nama_belakang }}</h3>
    </div>

    <div class="edit-form">
        <form action="/edit" method="post" autocomplete="off" style="width: 60%" class="mt-4" enctype="multipart/form-data">
            {{-- @method('patch') --}}
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="namaDepan" class="form-label">Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror" id="namaDepan" value="{{ old('nama_depan', $pasien->nama_depan) }}">
                    @error('nama_depan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="namaBelakang" class="form-label">Nama Belakang</label>
                    <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" id="namaBelakang" value="{{ old('nama_belakang', $pasien->nama_belakang) }}">
                    @error('nama_belakang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $pasien->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="input-form col-md-6">
                    <label for="profile" class="input-label">Profile </label>
                    <input type="file" class="form-control profile-edit-input @error('picture') is-invalid @enderror" name="picture" id="picture" />
                    @error('picture')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label for="NIK" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('NIK') is-invalid @enderror" name="NIK" id="NIK" value="{{ old('NIK', $pasien->NIK) }}">
                    @error('NIK')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="noHP" class="form-label">No Handphone</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="noHP" value="{{ old('no_hp', $pasien->no_hp) }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <br>
            <button class="btn btn-edit" type="submit" name="edit">Edit Data</button>
        </form>
        @if(auth()->user()->picture)
        <img src="{{ asset('storage/' . auth()->user()->picture) }}" class="img-thumbnail circle mt-2" width="30%" class="edit-img" alt="">
        @else
        <img src="storage/picture/profile.png" class="img-thumbnail circle mt-2" width="30%" class="edit-img" alt="">
        @endif
    </div>
</div>

@endsection