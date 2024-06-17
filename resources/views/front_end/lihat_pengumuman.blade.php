@include('front_end.layouts.head')
    
@include('front_end.layouts.nav')

<main>
    <div class="container marketing mt-5">
        <div class="row">
            <h2 class="featurette fw-normal mt-5 lh-1 float-end"><strong>Pengumuman Pendaftaran - SMK AL HUSNA</strong></h2>
        </div>
        <hr class="featurette">
        <div class="row">
            <div class="col">
                <h3>{{ $pengumuman->judul }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! nl2br(e($pengumuman->isi_pengumuman)) !!}
            </div>
        </div>
        <div class="row mt-3">
            <div class="col mb-5">

            </div>
        </div>
        <div class="row">
            <div class="col mb-5">
                <a href="{{ route('pengumuman-pendaftaran.index') }}" class="btn btn-sm btn-secondary float-end">Kembali</a>
            </div>
        </div>
    </div><!-- /.container -->
    
</main>
{{-- 
@include('front_end.layouts.foot') --}}
