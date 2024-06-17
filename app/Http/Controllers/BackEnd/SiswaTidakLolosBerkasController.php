<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class SiswaTidakLolosBerkasController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $calon_siswa = CalonSiswa::Where('lolos_dokumen', 2)->with('jurusan')->get();
            return datatables()->of($calon_siswa)
                ->addColumn('action', 'back_end.siswa_tidak_lolos_dokumen.action')
                ->addColumn('tempat_tanggal_lahir', function ($row) {
                    $formattedDate = Carbon::parse($row->tanggal_lahir)->format('d M Y');
                    return $row->tempat_lahir . ', ' . $formattedDate;
                })
                ->rawColumns(['action', 'tempat_tanggal_lahir', 'status']) 
                ->addIndexColumn()
                ->make(true);
        }
        
        $title = "Kelola Pendaftaran | Admin Panel";
        $header = "Pendaftaran";
        $page = "Siswa Tidak Lolos Dokumen";
        
        return view('back_end.siswa_tidak_lolos_dokumen.index')
            ->with('title', $title)
            ->with('header', $header)
            ->with('page', $page);
    }

    public function show(string $uuid)
    {
        $title = "Kelola Pendaftaran | Admin Panel";
        $header = "Pendaftaran";
        $page = "Detail Siswa Tidak Lolos Dokumen";
        $calon_siswa = CalonSiswa::where('uuid', $uuid)
        ->with('jurusan')
        ->firstOrFail();
        // dd($calon_siswa);
        return view('back_end.siswa_tidak_lolos_dokumen.detail', compact('calon_siswa'), ["page" => "Detail Siswa Tidak Lolos Dokumen" , 'calon_siswa' => $calon_siswa])
        ->with('title', $title)
        ->with('header', $header);
    }
}
