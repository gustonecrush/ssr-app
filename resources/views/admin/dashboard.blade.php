@extends('layouts/admin')

@section('main')
 <!-- Content Row -->
 <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="text-xs font-weight-bold text-secondary text-uppercase mb-1"
                >
                  Admin SSR
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div
                      class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                    >
                      {{ $count_admin }}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i
                  class="fas fa-key fa-2x text-gray-300"
                ></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-info text-uppercase mb-1"
              >
                User Terdaftar di SSR
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div
                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                  >
                    {{ $count_pasien }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i
                class="fas fa-user fa-2x text-gray-300"
              ></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-warning text-uppercase mb-1"
              >
                Surat Rujukan Masuk
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                {{ $count_surat }}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 mx-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>No Hp</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No Hp</th>
                        <th>Action</th>
                  </tr>
              </tfoot>
              <tbody>
               <?php $no = 1; ?>
                  @foreach ($pasiens as $pasien)
                    <tr>
                        <td><?= $no; ?></td>
                        <td>{{ $pasien->nama_depan }} {{ $pasien->nama_belakang }}</td>
                        <td>{{ $pasien->NIK }}</td>
                        <td>{{ $pasien->no_hp }}</td>
                        <td>
                            <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#infoPasien{{ $pasien->id }}">Info</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deletePasien{{ $pasien->id }}">Delete</button>
                        </td>
                    </tr>

                    <!-- The Modal -->
                    <div class="modal" id="infoPasien{{ $pasien->id }}">
                        <div class="modal-dialog">
                        <div class="modal-content">
                    
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Info User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                    
                            <!-- Modal body -->
                            <div class="modal-body">
                                <ul class="list-group">
                                    @if($pasien->picture != "")
                                      <li class="list-group-item"><img src="{{ asset('storage/' . $pasien->picture) }}" alt="" width="250"></li>
                                    @else
                                      <li class="list-group-item"><img src="{{ asset('assets/img/profile.png') }}" alt="" width="250"></li>
                                    @endif
                                    <li class="list-group-item">Nama  : {{ $pasien->nama_depan }} {{ $pasien->nama_belakang }}</li>
                                    <li class="list-group-item">Email : {{ $pasien->email }}</li>
                                    <li class="list-group-item">NIK : {{ $pasien->NIK }}</li>
                                    <li class="list-group-item">No Handphone : {{ $pasien->no_hp }}</li>
                                  </ul> 
                            </div>
                    
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                    
                        </div>
                        </div>
                </div>

                 <!-- Delete Modal -->
                 <div class="modal" id="deletePasien{{ $pasien->id }}">
                  <div class="modal-dialog">
                      <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                              <h4 class="modal-title">Delete Akun Pasien</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                              Apakah anda yakin ingin menghapus akun ini?
                              <form action="/admin/delete-pasien" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $pasien->id }}">
                                  <!-- Modal footer -->
                                  <div class="modal-footer mt-2">
                                      <button type="submit" name="hapus" class="btn btn-danger">Delete</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
                <?php $no++ ?>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>

                      <!-- DataTales Example -->
                      <div class="card shadow mb-4 mx-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Surat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>No Surat</th>
                                          <th>Nama Pasien</th>
                                          <th>No BPJS</th>
                                          <th>Tgl Pembuatan</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No Surat</th>
                                            <th>Nama Pasien</th>
                                            <th>No BPJS</th>
                                            <th>Tgl Pembuatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($surats as $surat)
                                          <tr>
                                              <td>{{ $surat->id }}</td>
                                              <td>{{ $surat->nama_pasien }}</td>
                                              <td>{{ $surat->no_bpjs }}</td>
                                              <td>{{ date("d M Y" ,strtotime($surat->tgl_pembuatan)) }}</td>
                                              <td>
                                                  <button class="btn btn-info" data-toggle="modal" data-target="#konfirmasi{{ $surat->id }}">Konfirmasi</button>
                                                  <a href="/admin/surat-rujukan/{{ $surat->id }}" class="btn btn-secondary">Info</a>
                                                  <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteSurat{{ $surat->id }}">Delete</button>
                                              </td>
                                          </tr>
          
                                      <!-- Delete Modal -->
                                      <div class="modal" id="konfirmasi{{ $surat->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
          
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Surat Rujukan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
          
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin mengonfirmasi surat ini ? <br>
                                                    <ul class="list-group">
                                                      <li class="list-group-item">Nama Pasien  : {{ $surat->nama_pasien }}</li>
                                                      <li class="list-group-item">No BPJS      : {{ $surat->no_bpjs }}</li>
                                                    </ul> 
                                                    <form action="/admin/konfirm" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $surat->id }}">
                                                        <input type="hidden" name="is_confrim" value="1">
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer mt-2">
                                                          @if ($surat->is_confirm != 1)
                                                            <button type="submit" name="konfirm" class="btn btn-success">Konfirmasi</button>
                                                          @else
                                                            <button disabled class="btn btn-secondary">Telah Dikonfirmasi</button>
                                                          @endif
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
          
                                      <!-- Delete Modal -->
                                      <div class="modal" id="deleteSurat{{ $surat->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
          
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Surat Rujukan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
          
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus surat ini?
                                                    <form action="/admin/delete-surat" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $surat->id }}">
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer mt-2">
                                                            <button type="submit" name="hapus" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection