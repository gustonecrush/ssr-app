{{-- {{ dd(session["nama_depan"]); }} --}}
{{-- {{ dd($surat->last()) }} --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- ============= META ============ -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ============ TITLE ============ -->
    <title>Upload Berkas | Sistem Surat Rujukan Online</title>

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
      <h1 class="upload-berkas-title">FORM UPLOAD BERKAS</h1>
      <form action="/upload-berkas" method="post" class="upload-berkas" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="id_surat" value="{{ $surat->id }}">
        <div class="row-isi-data">
          <div class="col-md-6">
            <div class="input-form">
              <label for="fotoKTP" class="input-label">Foto KTP </label>
              <input
                type="file"
                class="form-control @error('foto_ktp') is-invalid @enderror"
                name="foto_ktp"
                id="fotoKTP"
              />
              @error('foto_ktp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="input-form">
              <label for="kartuKeluarga" class="input-label">Kartu Keluarga </label>
              <input
                type="file"
                class="form-control @error('kartu_keluarga') is-invalid @enderror"
                name="kartu_keluarga"
                id="kartuKeluarga"
              />
              @error('kartu_keluarga')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="input-form">
              <label for="kartuBPJS" class="input-label">Kartu BPJS </label>
              <input type="file" class="form-control @error('kartu_bpjs') is-invalid @enderror" name="kartu_bpjs" id="kartuBPJS" />
              @error('kartu_bpjs')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="input-form">
              <label for="kartuBerobat" class="input-label"
                >Foto Kartu Berobat Puskesmas
              </label>
              <input type="file" class="form-control @error('kartu_berobat') is-invalid @enderror" name="kartu_berobat" id="kartuBerobat" />
              @error('kartu_berobat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <br>
        <div class="input-form suratKeteranganDokter">
          <label for="suratKeteranganDokter" class="input-label">Surat Keterangan Dokter </label>
          <input type="file" class="form-control @error('suket_dokter') is-invalid @enderror" name="suket_dokter" id="suratKeteranganDokter" />
          @error('suket_dokter')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <br>
        <button class="btn btn-isi-data upload-berkas" type="submit">Konfirmasi</button>
      </form>
    </section>

    <!-- ============= JS ============ -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>

    @include('sweetalert::alert')
    @livewireScripts
    @stack('scripts')
  </body>
</html>
