@include('front_end.layouts.head')
    
@include('front_end.layouts.nav')

<main>
    <div class="container marketing mt-5">
        <div class="row">
            <h2 class="featurette fw-normal lh-1"><strong>Hasil Pendaftaran Siswa/i - SMK AL HUSNA</strong></h2>
        </div>
        <hr class="featurette">
        <div class="row featurette">
            @if($calon_siswa->isEmpty())
                <span class="text-center mt-5"><b>Data Pendaftar Belum Tersedia</b></span>
            @else
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Pendaftaran</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">NEM Smp</th>
                    <th scope="col">Minat Jurusan</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php $no = 1; ?>
                    @foreach ($calon_siswa as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $item->no_pendaftaran }}
                            </td>
                            <td>
                                {{ $item->nama_lengkap }}
                            </td>
                            <td>
                                {{ $item->asal_sekolah }}
                            </td>
                            <td>
                                {{ $item->nem_smp }}
                            </td>
                            <td>
                                {{ $item->jurusan->nama_jurusan }}
                            </td>
                            <td>
                                @if ($item->lolos_dokumen == 1) 
                                    <span class="badge text-bg-success">Lolos Berkas</span>
                                @else 
                                    <span class="badge text-bg-danger">Tidak Lolos</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            @endif
        </div>
    </div><!-- /.container -->
    
</main>
{{-- 
@include('front_end.layouts.foot') --}}
