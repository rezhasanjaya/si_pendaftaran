@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $header }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default color-palette-box">
        <div class="card-header">
            <h3 class="card-title">{{ $page }}</h3>
        </div>

        <div class="card-body">
            @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show border-left-success" role="alert">
                {{ session('Success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row mb-3">
                <div class="col">
                    <a href="{{ route('pengumuman.create') }}" class="btn btn-sm btn-success float-right">Tambah Pengumuman
                    </a>
                </div>
            </div>
            <table class="table table-bordered" id="table-pengumuman">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status Publish</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $('#table-pengumuman').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('pengumuman') }}",
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
                // { data: 'id_universitas', name: 'id_universitas' },
                { data: 'judul', name: 'judul' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'status_publish', name: 'status_publish' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        
    });
</script>
@stop
