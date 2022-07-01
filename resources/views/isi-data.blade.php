<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- ============= META ============ -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ============ TITLE ============ -->
    <title>Isi Data | Sistem Surat Rujukan Online</title>

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
      <h1>FORM ISI DATA</h1>
      <h3>Data Pasien :</h3>
      <form action="/isi-data" method="post">
        @csrf
        <div class="col-md-6">
          <div class="input-form">
            <label for="namaPasien" class="input-label @error('nama_pasien') is-invalid @enderror">Nama Pasien </label>
            <input
              type="text"
              class="form-control"
              name="nama_pasien"
              id="namaPasien"
              value="{{ old('nama_pasien') }}"
            />
            @error('nama_pasien')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form">
            <label for="noBPJS" class="input-label">No Kartu BPJS </label>
            <input type="text" class="form-control @error('no_bpjs') is-invalid @enderror" name="no_bpjs" id="noBPJS" value="{{ old('no_bpjs') }}" />
            @error('no_bpjs')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form jk">
            <label for="jk" class="input-label">Jenis Kelamin </label>
            <div class="form-check">
              <input
                class="form-check-input @error('gender') is-invalid @enderror"
                type="checkbox"
                value="L"
                id="flexCheckDefault"
                name="gender"
                value="{{ old('gender') }}"
              />
              <label class="form-check-label" for="flexCheckDefault">
                Laki-Laki
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="P"
                id="flexCheckDefault"
                name="gender"
                value="{{ old('gender') }}"
              />
              <label class="form-check-label" for="flexCheckDefault">
                Perempuan
              </label>
            </div>
          </div>
          <div class="input-form">
            <label for="TTL" class="input-label">Tempat Tanggal Lahir</label>
            <input type="text" class="form-control @error('ttl') is-invalid @enderror" name="ttl" placeholder="Place, dd/mm/yy" value="{{ old('ttl') }}"/>
            @error('ttl')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form">
            <label for="umur" class="input-label">Umur</label>
            <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ old('umur') }}"/>
            @error('umur')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <br /><br />
          <div class="input-form">
            <label for="tanggalPembuatan" class="input-label"
              >Tanggal Pembuatan Surat</label
            >
            <input
              type="date"
              name="tgl_pembuatan"
              id="tanggalPembuatan"
              class="form-control @error('tgl_pembuatan') is-invalid @enderror"
              value="{{ old('tgl_pembuatan') }}"
            />
            @error('tgl_pembuatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="col-md-6" style="margin-left: 100px;">
          <div class="input-form">
            <label for="ibu" class="input-label">Nama Ibu Kandung </label>
            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" id="ibu" value="{{ old('nama_ibu') }}"/>
            @error('nama_ibu')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form">
            <label for="ayah" class="input-label">Nama Ayah Kandung </label>
            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" id="ayah" value="{{ old('nama_ayah') }}" />
            @error('nama_ayah')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form">
            <label for="goldar" class="input-label">Golongan Darah</label>
            <input type="text" class="form-control @error('golongan_darah') is-invalid @enderror" name="golongan_darah" id="goldar" value="{{ old('golongan_darah') }}"/>
            @error('golongan_darah')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form">
            <label for="pekerjaan" class="input-label">Pekerjaan</label>
            <input
              type="text"
              class="form-control @error('pekerjaan') is-invalid @enderror"
              name="pekerjaan"
              id="alamat"
              value="{{ old('pekerjaan') }}"
            />
            @error('pekerjaan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="input-form">
            <label for="alamat" class="input-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}"/>
            @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <br /><br /><br />
          <div class="input-form">
            <button class="btn btn-isi-data" type="submit">Konfirmasi</button>
          </div>
        </div>
        <input type="hidden" name="pasien_id" value="{{ auth()->user()->id }}">
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
