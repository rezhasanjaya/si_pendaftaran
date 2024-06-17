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
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col">
                        <h3>1. Foto Siswa</h3>
                      </div>
                    </div>
                    <img src="{{ asset('bukti/'.$calon_siswa->uuid.'/'.$calon_siswa->foto) }}" style="height:350px;" class="rounded mx-auto mt-3 d-block" alt="siswa-foto">
                  </div>
                  <div class="col-md-8">
                    <div class="row">
                      <span class="text-md text-dark">
                        <b>A. Informasi Siswa</b>
                      </span>
                      <div class="col">
                      </div>
                    
                      <div class="col">
                        @if($calon_siswa->lolos_dokumen == 0)
                        <form action="{{ route('calon-siswa.update',$calon_siswa->uuid) }}" method="POST" class="me-1">
                          @csrf
                          @method('PUT')
                          <button type="submit" name="submit" class="btn float-right ml-2 btn-success px-3 btn-xs"> <b>Setujui Berkas</b></button>
                        </form>
                        <!-- Vertically centered modal -->
                        <button type="button" class="btn float-right btn-xs px-3 btn-danger" data-toggle="modal" data-target="#staticBackdrop">
                          <b>Hapus (Spam)</b>
                        </button>
                        <a href="{{ route('calon-siswa.index') }}" data-toggle="tooltip" data-original-title="detail" class="btn btn-xs px-3 mr-2 btn-secondary float-right me-1">
                        <b>Kembali</b>
                        </a>
                        @else
                        <a href="{{ route('calon-siswa-approve') }}" data-toggle="tooltip" data-original-title="detail" class="btn btn-xs btn-secondary float-right me-1">
                          Kembali
                        </a>
                        @endif
                      </div>
                      
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                          <span class="text-sm text-secondary">
                            <b>Nomor Pendaftaran
                            </b>
                          </span>
                      </div>
                      <div class="col-md-1">
                        <span class="text-sm float-right text-secondary">
                          <b>:
                          </b>
                        </span>
                      </div>
                      <div class="col">
                          <h6>
                            <b>
                              {{ $calon_siswa->no_pendaftaran }}
                            </b>
                          </h6>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <span class="text-sm text-secondary">
                            <b>Nama Lengkap Siswa
                            </b>
                          </span>
                      </div>
                      <div class="col-md-1">
                        <span class="text-sm float-right text-secondary">
                          <b>:
                          </b>
                        </span>
                      </div>
                      <div class="col">
                          <h6>
                            <b>
                              {{ $calon_siswa->nama_lengkap }}
                            </b>
                          </h6>
                      </div>
                    </div>
  
                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Tempat, Tanggal Lahir
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($calon_siswa->tanggal_lahir)->format('d M Y') }}
                          </b>
                        </h6>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Asal Sekolah
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->asal_sekolah }}
                          </b>
                        </h6>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Kontak Siswa
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->nomor_telepon_siswa }}
                          </b>
                        </h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Minat Jurusan
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->jurusan->nama_jurusan }}
                          </b>
                        </h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Alamat
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                            {{ $calon_siswa->alamat }}
                        </h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row mt-1">
                    <span class="text-md text-dark">
                      <b>B. Informasi Orang Tua Siswa</b>
                    </span>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Nama Orang Tua / Wali
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->nama_orang_tua }}
                          </b>
                        </h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Pendidikan Terakhir Orang Tua
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->pendidikan_terakhir_orang_tua }}
                          </b>
                        </h6>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Pekerjaan Orang Tua
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->pekerjaan }}
                          </b>
                        </h6>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Nomor Telepon Orang Tua / Wali
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                          <b>
                            {{ $calon_siswa->nomor_telepon_orang_tua }}
                          </b>
                        </h6>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <span class="text-sm text-secondary">
                          <b> Alamat Orang Tua
                          </b>
                        </span>
                    </div>
                    <div class="col-md-1">
                      <span class="text-sm float-right text-secondary">
                        <b>:
                        </b>
                      </span>
                    </div>
                    <div class="col">
                        <h6>
                            {{ $calon_siswa->alamat_orang_tua }}
                        </h6>
                    </div>
                  </div>
                  <hr>
                  <div class="row mt-1">
                    <span class="text-md text-dark">
                      <b>C. Informasi Nilai Ujian Nasional SMP Siswa</b>
                    </span>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col-md-7">
                            <span class="text-sm text-secondary">
                              <b> Nilai Matematika
                              </b>
                            </span>
                        </div>
                        <div class="col-md-1">
                          <span class="text-sm float-right text-secondary">
                            <b>:
                            </b>
                          </span>
                        </div>
                        <div class="col">
                            <h6>
                              <b>
                                {{ $calon_siswa->nilai_matematika }}
                              </b>
                            </h6>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-7">
                            <span class="text-sm text-secondary">
                              <b> Nilai Ilmu Pengetahuan Alam
                              </b>
                            </span>
                        </div>
                        <div class="col-md-1">
                          <span class="text-sm float-right text-secondary">
                            <b>:
                            </b>
                          </span>
                        </div>
                        <div class="col">
                            <h6>
                              <b>
                                {{ $calon_siswa->nilai_ilmu_pengetahuan_alam }}
                              </b>
                            </h6>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="row">
                        <div class="col-md-7">
                            <span class="text-sm text-secondary">
                              <b> Nilai Bahasa Inggris
                              </b>
                            </span>
                        </div>
                        <div class="col-md-1">
                          <span class="text-sm float-right text-secondary">
                            <b>:
                            </b>
                          </span>
                        </div>
                        <div class="col">
                            <h6>
                              <b>
                                {{ $calon_siswa->nilai_bahasa_inggris }}
                              </b>
                            </h6>
                        </div>
                      </div>
      
                      <div class="row">
                        <div class="col-md-7">
                            <span class="text-sm text-secondary">
                              <b> Nilai Bahasa Indonesia
                              </b>
                            </span>
                        </div>
                        <div class="col-md-1">
                          <span class="text-sm float-right text-secondary">
                            <b>:
                            </b>
                          </span>
                        </div>
                        <div class="col">
                            <h6>
                              <b>
                                {{ $calon_siswa->nilai_bahasa_indonesia }}
                              </b>
                            </h6>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-7">
                            <span class="text-sm text-secondary">
                              <b> NEM SMP
                              </b>
                            </span>
                        </div>
                        <div class="col-md-1">
                          <span class="text-sm float-right text-secondary">
                            <b>:
                            </b>
                          </span>
                        </div>
                        <div class="col">
                            <h6>
                              <b>
                                {{ $calon_siswa->nem_smp }}
                              </b>
                            </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col">
                    <h3><b>Ijazah dan SKHU</b></h3>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col">
                    <h3>2. Ijazah</h3> 
                  </div>
                  <div class="col">
                    <h3>3. SKHU</h3> 
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <img src="{{ asset('bukti/'.$calon_siswa->uuid.'/'.$calon_siswa->ijazah) }}" style="height:600px;" class="rounded img-fluid mx-auto" alt="siswa-foto">
                  </div>
                 <div class="col"> <img src="{{ asset('bukti/'.$calon_siswa->uuid.'/'.$calon_siswa->skhu) }}" style="height:600px;" class="rounded img-fluid mx-auto" alt="siswa-foto"></div>
                </div>
                <div class="row mt-4">
                  <div class="col">
                   
                  </div>
                  @if($calon_siswa->lolos_dokumen == 0)
                  <div class="col">
                    <form action="{{ route('calon-siswa.update',$calon_siswa->uuid) }}" method="POST" class="me-1">
                      @csrf
                      @method('PUT')
                      <button type="submit" name="submit" class="btn float-right ml-2 mb-4 btn-sm btn-success px-3 btn"> <b>Setujui Berkas</b></button>
                    </form>
                    <form action="{{ route('calon-siswa.tolakBerkas',$calon_siswa->uuid) }}" method="POST" class="me-1">
                      @csrf
                      @method('PUT')
                      <button type="submit" name="submit" class="btn float-right mb-4 btn-sm btn-secondary px-3 btn"> <b>Tolak Berkas</b></button>
                    </form>
                  </div>
                  @else
                  <div class="col">
                    <a href="{{ route('calon-siswa-approve') }}" data-toggle="tooltip" data-original-title="detail" class="btn btn-sm btn-secondary float-right me-1">
                      Kembali
                    </a>
                  </div>
                  @endif
                </div>
              </div>                
              </div>
            </div>
        </div>          
        <!-- /.card-body -->
      </div>
      <!-- /.card --> 
              
    </div><!-- /.container-fluid -->

    {{-- Modal --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Hapus Sebagai Spam</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Yakin Ingin Menghapus Data ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <form action="{{ route('calon-siswa.handleSpam',$calon_siswa->uuid) }}" method="POST" class="me-1">
              @csrf
              @method('DELETE')
              <button type="submit" name="submit" class="btn float-right btn-sm btn-success px-3 btn"> <b>Ya</b></button>
            </form>
          </div>
        </div>
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
