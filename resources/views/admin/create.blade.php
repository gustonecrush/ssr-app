@extends('layouts/admin')

@section('main')
  
            <!-- DataTales Example -->
            <div class="card shadow mb-5">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Admin Baru</h6>
              </div>
              <div class="card-body">
                <form action="/admin/create-admin" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="username">Username :</label>
                      <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}" placeholder="Enter username" name="username" required>
                      @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password :</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" placeholder="Enter password" name="password" required>
                      @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Password :</label>
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Enter Confirm Password" name="confirm_password" required>
                        @error('confirm_password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                    <button type="submit" name="create" class="btn btn-primary">Tambah</button>
                  </form> 
              </div>
          </div>
@endsection