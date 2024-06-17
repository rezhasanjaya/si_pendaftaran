<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengumumanPendaftaranController extends Controller
{
    public function index() {
        $pengumuman = Pengumuman::where("is_publish", 1)->get();
        $title = "Pengumuman Pendaftaran | SMK AL - HUSNA";
        return view('front_end.pengumuman')
        ->with('title', $title)
        ->with('pengumuman', $pengumuman);
    }

    public function show(string $uuid){
        $title = "Pengumuman Pendaftaran | SMK AL - HUSNA";
        $pengumuman = Pengumuman::where('uuid', $uuid)
        ->firstOrFail();
        return view('front_end.lihat_pengumuman', compact('pengumuman'), ["page" => "Lihat Pengumuman" , 'pengumuman' => $pengumuman])
        ->with('title', $title);
    }
}
