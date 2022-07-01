@extends('layouts/admin')

@section('main')  
            <h5 class="mb-4 text-dark">No.BPJS : {{ $data->no_bpjs }} | {{ $data->tgl_pembuatan }}</h5> 
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body p-5">
                <h6 class="btn btn-primary font-weight-bold mb-4 text-light">Data Pribadi </h6>
                  <div class="row">
                    <ul class="list-group col-md-6">
                        <li class="list-group-item">Nama Pasien : {{ $data->nama_pasien }}</li>
                        <li class="list-group-item">Nama Ayah : {{ $data->nama_ayah }}</li>
                        <li class="list-group-item">Nama Ibu : {{ $data->nama_ibu }}</li>
                        <li class="list-group-item">Alamat : {{ $data->alamat }}</li>
                      </ul> 
                      <ul class="list-group col-md-6">
                        <li class="list-group-item">Umur : {{ $data->umur }} Tahun</li>
                        <li class="list-group-item">Gender : {{ $data->gender === "L" ? "Laki-laki" : "Perempuan" }}</li>
                        <li class="list-group-item">Golongan Darah : {{ $data->golongan_darah }}</li>
                        <li class="list-group-item">TTL : {{ $data->ttl }}</li>
                      </ul> 
                  </div>
              <br>
              <h6 class="btn btn-primary font-weight-bold mb-4 text-light">Berkas - Berkas Terlampir </h6>
              <div class="row">
                <ul class="list-group col-md-6">
                    <li class="list-group-item">Foto KTP : <br>
                        <img src="{{ asset('storage/' . $data->foto_ktp) }}" class="img-thumbnail" width="200px" />
                    </li>
                    <li class="list-group-item">Foto Kartu Berobat : <br>
                        <img src="{{ asset('storage/' . $data->kartu_berobat) }}" class="img-thumbnail" width="200px" />
                    </li>
                  </ul> 
                  <ul class="list-group col-md-6">
                    <li class="list-group-item">Kartu Keluarga : <br>
                        <embed src="{{ asset('storage/' . $data->kartu_keluarga) }}" frameBorder="0"
                            scrolling="auto" class="img-thumbnail" width="100%" height="100%" />
                    </li>
                    <li class="list-group-item">Kartu BPJS : <br>
                        <embed src="{{ asset('storage/' . $data->kartu_bpjs) }}" frameBorder="0"
                            scrolling="auto" class="img-thumbnail" width="100%" height="100%" />
                    </li>
                    <li class="list-group-item">Surat Keterangan Dokter : <br>
                        <embed src="{{ asset('storage/' . $data->suket_dokter) }}" frameBorder="0"
                            scrolling="auto" class="img-thumbnail" width="100%" height="100%" />
                    </li>
                  </ul>
              </div>
            </div>
        </div>
@endsection