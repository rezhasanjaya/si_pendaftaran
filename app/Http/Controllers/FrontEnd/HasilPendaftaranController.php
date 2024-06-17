<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HasilPendaftaranController extends Controller
{
    public function index() {
        $calon_siswa = CalonSiswa::where("lolos_dokumen", "!=", 0)->get();
        $title = "Hasil Pendaftaran Siswa/i | SMK AL - HUSNA";
        return view('front_end.hasil_pendaftaran')
        ->with('title', $title)
        ->with('calon_siswa', $calon_siswa);
       }
}
