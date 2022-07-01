@extends('layouts/admin')

@section('main')
  
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <button class="btn btn-info" data-toggle="modal" data-target="#createContent"> <i class="fa fa-plus" style="font-size: 18px"></i>  Create New Content</button>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>URL</th>
                                <th>Action</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                    <th>No</th>
                                    <th>Thumbnail</th>
                                    <th>Judul</th>
                                    <th>URL</th>
                                    <th>Action</th>
                              </tr>
                          </tfoot>
                          <tbody>
                           <?php $no = 1; ?>
                              @foreach ($contents as $content)
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td>
                                        <img src="{{ asset('storage/' . $content->thumbnail) }}" alt="" width="150">
                                    </td>
                                    <td>{{ $content->judul }}</td>
                                    <td><a href="{{ $content->url }}">{{ $content->url }}</a></td>
                                    <td>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteContent{{ $content->id }}">Delete</button>
                                    </td>
                                </tr>

                             <!-- Delete Modal -->
                             <div class="modal" id="deleteContent{{ $content->id }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">

                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                          <h4 class="modal-title">Delete Content</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>

                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          Apakah anda yakin ingin menghapus content ini?
                                          <form action="/admin/delete-content" method="post">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $content->id }}">
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
  
  <!-- The Modal -->
  <div class="modal" id="createContent">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create New Content</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="/admin/create-content" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="judul">Judul :</label>
                  <input type="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}" placeholder="Enter Judul" name="judul" required>
                  @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="URL">URL :</label>
                  <input type="URL" class="form-control @error('URL') is-invalid @enderror" id="URL" value="{{ old('URL') }}" placeholder="Enter URL" name="url" required>
                  @error('URL')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="custom-file col-md-6">
                    <label for="thumbnail" class="input-label">Thumbnail </label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" />
                    @error('thumbnail')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" name="create" class="btn btn-info">Create</button>
        </div>
        </form>
  
      </div>
    </div>
  </div>
@endsection