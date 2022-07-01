@extends('layouts/admin')

@section('main')  
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th>No</th>
                                  <th>Username</th>
                                  <th>Created At</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>Username</th>
                                  <th>Created At</th>
                                  <th>Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                              <?php $no = 1; ?>
                              @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAdmin{{ $admin->id }}">Delete</button>
                                    </td>
                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal" id="deleteAdmin{{ $admin->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Admin</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus admin {{ $admin->username }}?
                                                <form action="/admin/delete-admin/{{ $admin->username }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{ $admin->username }}">
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer mt-2">
                                                        <button type="submit" name="hapus" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $no++; ?>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
@endsection