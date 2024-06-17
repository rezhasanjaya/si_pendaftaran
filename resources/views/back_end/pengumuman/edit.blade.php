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
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('pengumuman.update', $pengumuman->uuid) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Pengumuman<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukan judul" value="{{ $pengumuman->judul }}" required>
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isi_pengumuman" class="form-label">Isi Pengumuman<span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-sm @error('isi_pengumuman') is-invalid @enderror" id="isi_pengumuman" name="isi_pengumuman" placeholder="Masukan isi pengumuman" style="height: 500px;" required>{{  $pengumuman->isi_pengumuman }}</textarea>
                            @error('isi_pengumuman')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col ">
                                <button type="submit" class="btn btn-sm btn-success float-right ml-2">Edit Berita</button>
                                <a href="{{ route('pengumuman.index') }}" class="btn btn-sm  btn-secondary float-right">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
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
