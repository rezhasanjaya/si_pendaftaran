<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    public function index()
    {
        $jumlahCalonPendaftar = CalonSiswa::count();
        $jumlahLolosDokumen = CalonSiswa::where('lolos_dokumen', 1)->count();
        $jumlahTidakLolosDokumen = CalonSiswa::where('lolos_dokumen', 2)->count();
        $jumlahBelumTerkonfirmasi = CalonSiswa::where('lolos_dokumen', 0)->count();

        $jumlahDataTerkonfirmasi = $jumlahTidakLolosDokumen + $jumlahLolosDokumen;
        $jumlahSpam = CalonSiswa::onlyTrashed()->count();
        $totalData = $jumlahDataTerkonfirmasi + $jumlahSpam;
        // dd($totalData);
        $persentasiDataAsli = $totalData != 0 ? ($jumlahDataTerkonfirmasi / $totalData) * 100 : 0;
        $persentasiSpam = $totalData != 0 ? ($jumlahSpam / $totalData) * 100 : 0;
        
        $jurusan = Jurusan::count();
        return view('dashboard')
        ->with('jumlahCalonPendaftar', $jumlahCalonPendaftar)
        ->with('jumlahLolosDokumen', $jumlahLolosDokumen)
        ->with('jumlahTidakLolosDokumen', $jumlahTidakLolosDokumen)
        ->with('jumlahBelumTerkonfirmasi', $jumlahBelumTerkonfirmasi)
        ->with('jumlahDataTerkonfirmasi', $jumlahDataTerkonfirmasi)
        ->with('jumlahSpam', $jumlahSpam)
        ->with('persentasiDataAsli', $persentasiDataAsli)
        ->with('persentasiSpam', $persentasiSpam)
        ->with('jurusan', $jurusan)
        ;
    }

}
