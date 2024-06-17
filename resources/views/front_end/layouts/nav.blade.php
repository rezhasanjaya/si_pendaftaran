<header data-bs-theme="light">
    <nav class="navbar navbar-expand-md navbar-lg navbar-light text-dark fixed-top bg-light">
      <div class="container">
        <a class="navbar-brand text-dark" href="{{ route('beranda') }}"><strong>SIPENDAF</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon bg-dark"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="col">
  
          </div>
          <div class="d-flex" role="search">
              <div class="nav-item px-3 py-3">
                  <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
              </div>
              <div class="nav-item px-3 py-3">
                  <a class="nav-link" href="{{ route('daftar') }}">Daftar</a>
              </div>
              <div class="nav-item px-3 py-3">
                  <a class="nav-link" href="{{ route('hasil-pendaftaran.index') }}">Hasil Pendaftaran</a>
              </div>
              <div class="nav-item px-3 py-3">
                <a class="nav-link" href="{{ route('pengumuman-pendaftaran.index') }}">Pengumuman</a>
              </div>
          </div>
        </div>
      </div>
    </nav>
</header>