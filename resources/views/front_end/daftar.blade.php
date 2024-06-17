@include('front_end.layouts.head')
    
@include('front_end.layouts.nav')

<main>
    <div class="container marketing mt-5">
        <div class="row">
            <h2 class="featurette fw-normal lh-1"><strong>Form Pendaftaran Calon Siswa/i - SMK AL HUSNA</strong></h2>
        </div>
        <hr class="featurette">
        @if(session('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('Success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif 
        <div class="row featurette">
            <form action="{{ route('daftar-calon-siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-1">
                        <h5 class="float-end">A.</h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h5>Keterangan Calon Siswa</h5>
                            </div>
                            <div class="col">
                                <div id="form-note" class="form-text mb-3 float-end"><span class="text-danger"> <strong>*</strong></span> Harap isi data sesuai dengan ijazah terakhir atau akta kelahiran</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap" value="{{ old('nama_lengkap') }}" required>
                            @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Minat Jurusan<span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan') == $j->id ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan tempat lahir" value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" name="asal_sekolah" placeholder="Masukan asal sekolah" value="{{ old('asal_sekolah') }}" required>
                            @error('asal_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Tempat Tinggal<span class="text-danger">*</span></label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukan alamat" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon_siswa" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control form-control-sm @error('nomor_telepon_siswa') is-invalid @enderror" id="nomor_telepon_siswa" name="nomor_telepon_siswa" placeholder="Masukan nomor telepon siswa" value="{{ old('nomor_telepon_siswa') }}">
                            @error('nomor_telepon_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-1">
                        <h5 class="float-end">B.</h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h5>Nilai Ujian Nasional SMP</h5>
                            </div>
                            <div class="col">
                                <div id="form-note" class="form-text float-end mb-3"><span class="text-danger"><strong>*</strong></span> Gunakan koma untuk menulis nilai (contoh: 3,87)</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="nilai_bahasa_inggris" class="form-label">Nilai Bahasa Inggris<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="10" class="form-control form-control-sm @error('nilai_bahasa_inggris') is-invalid @enderror" id="nilai_bahasa_inggris" name="nilai_bahasa_inggris" placeholder="Masukan nilai Bahasa Inggris" value="{{ old('nilai_bahasa_inggris') }}" step="0.01" required>
                            @error('nilai_bahasa_inggris')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nilai_matematika" class="form-label">Nilai Matematika<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="10" class="form-control form-control-sm @error('nilai_matematika') is-invalid @enderror" id="nilai_matematika" name="nilai_matematika" placeholder="Masukan nilai Matematika" value="{{ old('nilai_matematika') }}" step="0.01" required>
                            @error('nilai_matematika')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nilai_bahasa_indonesia" class="form-label">Nilai Bahasa Indonesia<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="10" class="form-control form-control-sm @error('nilai_bahasa_indonesia') is-invalid @enderror" id="nilai_bahasa_indonesia" name="nilai_bahasa_indonesia" placeholder="Masukan nilai Bahasa Indonesia" value="{{ old('nilai_bahasa_indonesia') }}" step="0.01" required>
                            @error('nilai_bahasa_indonesia')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nilai_ilmu_pengetahuan_alam" class="form-label">Nilai Ilmu Pengetahuan Alam<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="10" class="form-control form-control-sm @error('nilai_ilmu_pengetahuan_alam') is-invalid @enderror" id="nilai_ilmu_pengetahuan_alam" name="nilai_ilmu_pengetahuan_alam" placeholder="Masukan nilai IPA" value="{{ old('nilai_ilmu_pengetahuan_alam') }}" step="0.01" required>
                            @error('nilai_ilmu_pengetahuan_alam')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-md-1">
                        <h5 class="float-end">C.</h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h5>Data Orang Tua (Bapak / Ibu / Wali)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="nama_orang_tua" class="form-label">Nama Orang Tua<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('nama_orang_tua') is-invalid @enderror" id="nama_orang_tua" name="nama_orang_tua" placeholder="Masukan nama orang tua" value="{{ old('nama_orang_tua') }}" required>
                            @error('nama_orang_tua')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" placeholder="Masukan pekerjaan" value="{{ old('pekerjaan') }}" required>
                            @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan_terakhir_orang_tua" class="form-label">Pendidikan Terakhir Orang Tua<span class="text-danger">*</span></label>
                            <select class="form-control form-control-sm @error('pendidikan_terakhir_orang_tua') is-invalid @enderror" id="pendidikan_terakhir_orang_tua" name="pendidikan_terakhir_orang_tua" required>
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <option value="SD" {{ old('pendidikan_terakhir_orang_tua') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_terakhir_orang_tua') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_terakhir_orang_tua') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ old('pendidikan_terakhir_orang_tua') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan_terakhir_orang_tua') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_terakhir_orang_tua') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_terakhir_orang_tua') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_terakhir_orang_tua')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat_orang_tua" class="form-label">Alamat Tempat Tinggal Orang Tua<span class="text-danger">*</span></label>
                            <textarea class="form-control @error('alamat_orang_tua') is-invalid @enderror" id="alamat_orang_tua" name="alamat_orang_tua" rows="3" placeholder="Masukan alamat orang tua" required>{{ old('alamat_orang_tua') }}</textarea>
                            @error('alamat_orang_tua')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor_telepon_orang_tua" class="form-label">Nomor Telepon Orang Tua<span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm @error('nomor_telepon_orang_tua') is-invalid @enderror" id="nomor_telepon_orang_tua" name="nomor_telepon_orang_tua" placeholder="Masukan nomor telepon orang tua" value="{{ old('nomor_telepon_orang_tua') }}" required>
                            @error('nomor_telepon_orang_tua')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-md-1">
                        <h5 class="float-end">D.</h5>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <h5>Upload Dokumen Prasyarat</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="ijazah" class="form-label">Ijazah SMP<span class="text-danger">*</span></label>
                            <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" accept=".png, .jpeg, .jpg" required />
                            <div id="ijazah-help" class="form-text">Maksimal besar ukuran file 2MB .png, .jpeg, .jpg</div>
                            @error('ijazah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="skhu" class="form-label">Surat Keterangan Hasil Ujian Nasional SMP<span class="text-danger">*</span></label>
                            <input type="file" name="skhu" class="form-control @error('skhu') is-invalid @enderror" accept=".png, .jpeg, .jpg" />
                            <div id="skhu-help" class="form-text">Maksimal besar ukuran file 2MB .png, .jpeg, .jpg</div>
                            @error('skhu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto-siswa" class="form-label">Foto Siswa<span class="text-danger">*</span></label>
                            <input type="file" name="foto-siswa" class="form-control @error('foto-siswa') is-invalid @enderror" accept=".png, .jpeg, .jpg" />
                            <div id="foto-siswa-help" class="form-text">Maksimal besar ukuran file 2MB .png, .jpeg, .jpg (2 x 3)</div>
                            @error('foto-siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md">
                        <button type="submit" class="btn float-end btn-sm btn-primary">Daftar</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </form>
        </div>
    </div><!-- /.container -->
    
</main>

{{-- @include('front_end.layouts.foot') --}}
