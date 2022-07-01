@extends('layouts/main')

@section('main')
<main class="dashboard">
    <div class="profile-header">
      <h1 class="dashboard-title">Selamat Datang</h1>
      <h2 class="dashboard-subtitle">Di Sistem Surat Rujukan Online</h2>
    </div>
    <div class="profile-edit">
      @if(auth()->user()->picture)
      <div class="profile-img">
        <img src="{{ asset('storage/' . auth()->user()->picture) }}" alt="Profile's Picture" width="200" />
      </div>
      @else
      <div class="profile-img">
        <img src="{{ asset('storage/picture/profile.png') }}" alt="Profile's Picture" width="200" />
      </div>
      @endif
      <a href="/edit" class="edit" title="Edit Data"><i class="bx bxs-edit"></i></a>
    </div>
    <div class="profile-data">
      <div class="data">
        <i class="bx bx-user-check"></i>
        <p>{{ auth()->user()->nama_depan }} {{ auth()->user()->nama_belakang }}</p>
      </div>
      <div class="data">
        <i class="bx bx-book-alt"></i>
        <p>{{ auth()->user()->NIK }}</p>
      </div>
      <div class="data">
        <i class="bx bx-phone"></i>
        <p>{{ auth()->user()->no_hp }}</p>
      </div>
    </div>
    <a class="btn" href="/opsi">Pilih Opsi</a>
  </main>
@endsection
