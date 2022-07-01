<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- ============= META ============ -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ============ TITLE ============ -->
    <title>Unduh Surat | Sistem Surat Rujukan Online</title>

    <!-- ========== BOX ICONS ========== -->
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
      rel="stylesheet"
    />

    <!-- ========== BOOTSTRAP ========== -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    @livewireStyles

    <!-- ============= CSS ============= -->
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <body class="">
    <!-- ========== KETENTUAN ========== -->
    <section class="form-isi-data">
      <h1>UNDUH SURAT</h1>
      <form action="" method="post" class="unduh-berkas">
        <h2>Surat Rujukan Atas Nama</h2>
        <input
          type="text"
          value="{{ $surat->nama_pasien }}"
          name="namaPasien"
          class="form-control"
          class="text"
          readonly
          style="margin: 40px auto !important; text-align: center; font-size: 38px;"
        />
        <h2>{{ $surat->is_confirm == 1 ? "Sudah " : "Belum " }} Terkonfirmasi</h2>
        <br /><br />
        <h4>Silahkan Klik Untuk Mengunduh Surat</h4>
      </form>
      <div class="btns">
          <a href="/unduh-surat-rujukan" class="btn">Unduh</a>
          <a href="/send-email-pdf" class="btn">Kirim Ke Rumah Sakit</a>
          <a href="/opsi" class="btn back">Kembali</a>
      </div>
    </section>

    @include('sweetalert::alert')
    @livewireScripts
    @stack('scripts')

    