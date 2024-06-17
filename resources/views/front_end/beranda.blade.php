@include('front_end.layouts.head')

@include('front_end.layouts.nav')
<main>

<h1 class="visually-hidden">Beranda</h1>

<div class="px-4 py-5 my-5 text-center">
  <img class="d-block mx-auto mb-4" src="{{ asset('image/logoalhusna.jpeg') }}" alt="logo" height="130px">
  <h3 class="display-5 fw-bold">Selamat Datang Di SIPENDAF</h3>
  <h4 class="text-body-emphasis">Portal Pendaftaran SMK AL - HUSNA Pasirnangka</h4>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">SIPENDAF adalah portal pendaftaran online untuk SMK AL - HUSNA Pasirnangka. pada sipendaf, Anda dapat mendaftar untuk menjadi siswa baru, memeriksa hasil pendaftaran, dan mendapatkan informasi terbaru seputar proses penerimaan siswa baru.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a href="{{ route('daftar') }}" class="btn btn-primary btn-lg px-4 gap-3">Mulai Daftar</a>
      <a href="{{ route('hasil-pendaftaran.index') }}" class="btn btn-outline-secondary btn-lg px-4">Lihat Hasil</a>
    </div>
  </div>
</div>

</main>

{{-- @include('front_end.layouts.foot') --}}
