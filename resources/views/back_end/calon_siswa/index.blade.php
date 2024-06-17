@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>
       {{ $header }}
    </h1>
@stop

@section('content')
    <div class="container-fluid">
      <!-- COLOR PALETTE -->
      <div class="card card-default color-palette-box">
        <div class="card-header">
          <h3 class="card-title">
            {{ $page }}
          </h3>
        </div>
       
        <div class="card-body">
          <div class="col-12">
          @php
          $heads = [
              'No',
              'Nama Jurusan',
              ['label' => 'Actions', 'no-export' => true, 'width' => 5],
          ];
          $config = [
              'data' => [],
              'order' => [[1, 'asc']],
              'columns' => [null, null, null, ['orderable' => false]],
          ];
          @endphp
        @if (session('Success'))
        <div class="alert alert-success alert-dismissible fade show border-left-success" role="alert">
            {{ session('Success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
          <div class="col">
            {{-- <button type="button" class="btn btn-sm btn-success float-right mb-3" data-toggle="modal" data-target="#addModal">
              Tambah Jurusan
            </button> --}}
          </div>
        </div>
          <table class="table table-bordered" id="table-calon-siswa">
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Data</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('jurusan.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan</label>
                        <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah Data</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <thead>
               <tr>
                  <th>No</th>
                  <th>No Pendaftaran</th>
                  <th>Nama Lengkap</th>
                  <th>TTL</th>
                  <th>Asal Sekolah</th>
                  <th>NEM</th>
                  <th>Minat Jurusan</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
          </div>
          <hr>
        </div>          
        <!-- /.card-body -->
      </div>
      <!-- /.card --> 
              
    </div><!-- /.container-fluid -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
      $('#table-calon-siswa').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ url('calon-siswa') }}",
          columns: [
              {
                  data: null,
                  name: 'DT_RowIndex',
                  orderable: false,
                  searchable: false,
                  render: function (data, type, full, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
              },
              { data: 'no_pendaftaran', name: 'no_pendaftaran' },
              { data: 'nama_lengkap', name: 'nama_lengkap' },
              { data: 'tempat_tanggal_lahir', name: 'tempat_tanggal_lahir' },
              { data: 'asal_sekolah', name: 'asal_sekolah' },
              { data: 'nem_smp', name: 'nem_smp' },
              { data: 'jurusan.nama_jurusan', name: 'jurusan.nama_jurusan' },
              { data: 'action', name: 'action', orderable: false, searchable: false },
          ]
      });
  
      $('body').on('click', '.delete', function () {
      var id = $(this).data('id');

        if (confirm("Delete Record?") == true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('calon-siswa') }}/" + id + "/handle-spam",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(res){
                    var oTable = $('#table-jurusan').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(xhr, status, error){
                    console.log(xhr.responseText);
                }
            });
        }
      });

  });
  </script>
@stop
