@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-1">Dashboard</h1>
@stop

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="info-box" style="height: 176px">
                <div class="info-box-content" >
                  <div class="row">
                    <div class="col">
                        <span class="info-box-text">Persentase Data Pendaftar</span>
                    </div>
                    <div class="col">
                        <strong><p class="float-right" id="currentTime">{{ \Carbon\Carbon::now()->format('H:i:s') }}</p></strong>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col">
                        <span class="info-box-number">Data Asli</span>
                    </div>
                    <div class="col">
                        <span class="info-box-number float-right">Spam</span>
                    </div>
                  </div>
                  <div class="progress">
                    @if($persentasiDataAsli <= 40)
                        <div class="progress-bar" style="width: {{ $persentasiDataAsli }}%; background-color: red"></div>
                    @elseif($persentasiDataAsli > 40 && $persentasiDataAsli <= 70)
                        <div class="progress-bar" style="width: {{ $persentasiDataAsli }}%; background-color: orange"></div>
                    @elseif($persentasiDataAsli > 70)
                        <div class="progress-bar" style="width: {{ $persentasiDataAsli }}%; background-color: green"></div>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col">
                        <span class="progress-description">
                            {{ $persentasiDataAsli }}%
                        </span>
                    </div>
                    <div class="col">
                        <span class="progress-description float-right">
                            {{ $persentasiSpam }}%
                        </span>
                    </div>
                  </div>
                 
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fa fa-laptop text-white"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Jurusan</span>
                          <span class="info-box-number">{{ $jurusan }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Jumlah Pendaftar</span>
                          <span class="info-box-number">{{ $jumlahCalonPendaftar }}</span>
                        </div>
                    </div>
                </div>
                
              
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-check-circle"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Pendaftar Lolos Dokumen</span>
                          <span class="info-box-number">{{ $jumlahLolosDokumen }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fa fa-times-circle text-white"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Pendaftar Tidak Lolos Dokumen</span>
                          <span class="info-box-number">{{ $jumlahTidakLolosDokumen }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
      <div class="row">
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-secondary"><i class="fa fa-question"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pendaftar Belum Terkonfirmasi</span>
                  <span class="info-box-number">{{ $jumlahBelumTerkonfirmasi }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-dark"><i class="far fa-thumbs-up text-white"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pendaftar Terkonfirmasi</span>
                  <span class="info-box-number">{{ $jumlahDataTerkonfirmasi }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa fa-trash text-white"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Spam</span>
                  <span class="info-box-number">{{ $jumlahSpam }}</span>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function updateTime() {
      const now = new Date();
      const timeString = now.getHours().toString().padStart(2, '0') + ':' +
                         now.getMinutes().toString().padStart(2, '0') + ':' +
                         now.getSeconds().toString().padStart(2, '0');
  
      document.getElementById('currentTime').textContent = timeString;
  }
  
  // Perbarui waktu setiap detik
  setInterval(updateTime, 1000);
  </script>
@stop
