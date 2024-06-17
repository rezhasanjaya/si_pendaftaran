<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalonSiswa;

class SiswaTerimaController extends Controller
{
   public function index() {
    $calon_siswa = CalonSiswa::get(); 
    $title = "Daftar Siswa Lolos Berkas | SMK AL - HUSNA";
    return view('front_end.siswa_diterima')
    ->with('title', $title)
    ->with('calon_siswa', $calon_siswa);
   }
}
