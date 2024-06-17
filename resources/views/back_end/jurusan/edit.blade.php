@extends('adminlte::page')

@section('title', $title)

@section('content_header')
    <h1>{{ $header }}</h1>
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
          <form action="{{route('jurusan.update', $jurusan->uuid)}}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan</label>
                    <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" placeholder="Masukan kode"  value="{{ $jurusan->nama_jurusan }}">
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-sm btn-primary float-right mr-2">Submit</button>
                    <a href="{{ route('jurusan.index') }}" class="btn btn-sm btn-secondary mr-2 mb-2 float-right"><i class="fa-solid fa-pen-to-square"></i>Kembali</a>
                </div>
          </form>
        </div>
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

@stop
