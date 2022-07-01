@extends('layouts/main')

@section('main')
<main class="home d-flex">
    <div class="content">
        <h1 class="home-title">Hai, Selamat Datang Di SSR</h1>
        <h5 class="home-subtitle">
        Mengurus surat rujukan dengan lebih cepat dan mudah
        </h5>
        <p class="home-desc">
        SSR membantumu melengkapi syarat syarat dalam <br />
        pengajuan surat rujukan secara online.
        </p>
        <a href="/users" class="btn btn-md align-self-center mt-3">Mulai</a>
    </div>

    <!-- <div class="img"> -->
    <img class="home-img-doctor" src="assets/img/doctor.png" />
    <!-- </div> -->
</main>

<img
class="home-img-decor col-md-3"
src="assets/img/elipse-decoration.png"
alt=""
/>
@endsection