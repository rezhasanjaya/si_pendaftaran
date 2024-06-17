<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\Jurusan;
use App\Models\CalonSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DaftarController extends Controller
{
    public function index() {
        $jurusan = Jurusan::all(); 
        $title = "Daftar | SMK AL - HUSNA";
        return view('front_end.daftar')
        ->with('title', $title)
        ->with('jurusan', $jurusan);
    }

    // public function store(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'nama_lengkap' => 'required|string|max:255',
    //             'tempat_lahir' => 'required|string|max:255',
    //             'tanggal_lahir' => 'required|date',
    //             'asal_sekolah' => 'required|string|max:255',
    //             'alamat' => 'required|string',
    //             'nomor_telepon_siswa' => 'required|numeric|min:0',
    //             // 'jurusan' => 'required|numeric',
    //             'nilai_bahasa_inggris' => 'required|numeric|min:0',
    //             'nilai_matematika' => 'required|numeric|min:0',
    //             'nilai_bahasa_indonesia' => 'required|numeric|min:0',
    //             'nilai_ilmu_pengetahuan_alam' => 'required|numeric|min:0',
    //             'nama_orang_tua' => 'required|string|max:255',
    //             'pekerjaan' => 'required|string|max:255',
    //             'pendidikan_terakhir_orang_tua' => 'required|in:SD,SMP,SMA,D3,S1,S2,S3',
    //             'alamat_orang_tua' => 'required|string',
    //             'nomor_telepon_orang_tua' => 'required|numeric|min:0',
    //             'ijazah' => 'required|max:2048|mimes:jpg,png,jpeg',
    //             'skhu' => 'required|max:2048|mimes:jpg,png,jpeg',
    //             'foto' => 'required|max:2048|mimes:jpg,png,jpeg',
    //         ]);
    //         $countSiswa = CalonSiswa::count() + 1;
    //         $formatNoPendaftaran = Carbon::parse($request->tanggal_lahir)->format('dmY');
    //         $tahun_ini = Carbon::now()->year;
    //         $test = $tahun_ini.$formatNoPendaftaran.$countSiswa;

    //         $calon_siswa = new CalonSiswa;
    //         $calon_siswa->uuid = Str::uuid();
    //         $calon_siswa->nama_lengkap = $request->nama_lengkap;
    //         $calon_siswa->tempat_lahir = $request->tempat_lahir;
    //         $calon_siswa->tanggal_lahir = $request->tanggal_lahir;
    //         $calon_siswa->asal_sekolah = $request->asal_sekolah;
    //         $calon_siswa->alamat = $request->alamat;
    //         $calon_siswa->nomor_telepon_siswa = $request->nomor_telepon_siswa;
    //         $calon_siswa->jurusan_id = 1;
    //         $calon_siswa->no_pendaftaran = "Test";
    //         $calon_siswa->nem_smp = ($request->nilai_bahasa_inggris + $request->nilai_matematika + $request->nilai_bahasa_indonesia +  $request->nilai_ilmu_pengetahuan_alam);
    //         $calon_siswa->nilai_bahasa_inggris = $request->nilai_bahasa_inggris;
    //         $calon_siswa->nilai_matematika = $request->nilai_matematika;
    //         $calon_siswa->nilai_bahasa_indonesia = $request->nilai_bahasa_indonesia;
    //         $calon_siswa->nilai_ilmu_pengetahuan_alam = $request->nilai_ilmu_pengetahuan_alam;
    //         $calon_siswa->nama_orang_tua = $request->nama_orang_tua;
    //         $calon_siswa->pekerjaan = $request->pekerjaan;
    //         $calon_siswa->pendidikan_terakhir_orang_tua = $request->pendidikan_terakhir_orang_tua;
    //         $calon_siswa->alamat_orang_tua = $request->alamat_orang_tua;
    //         $calon_siswa->nomor_telepon_orang_tua = $request->nomor_telepon_orang_tua;
    //         $calon_siswa->lolos_dokumen = 0;

    //         if ($image = $request->file('ijazah')) {
    //             $destinationPath = 'bukti/'.$calon_siswa->uuid.'/';
    //             $extension = $image->getClientOriginalExtension();
    //             $filename = 'ijazah-'.$calon_siswa->uuid. '.'.$extension;
    //             if (!File::exists($destinationPath)) {
    //                 File::makeDirectory($destinationPath, $mode = 0755, true, true);
    //             }
    //             $image->move(public_path($destinationPath), $filename);
    //             $calon_siswa->ijazah = $filename;
    //         }
    //         if ($image = $request->file('skhu')) {
    //             $destinationPath = 'bukti/'.$calon_siswa->uuid.'/';
    //             $extension = $image->getClientOriginalExtension();
    //             $filename = 'skhu-'.$calon_siswa->uuid. '.'.$extension;
    //             if (!File::exists($destinationPath)) {
    //                 File::makeDirectory($destinationPath, $mode = 0755, true, true);
    //             }
    //             $image->move(public_path($destinationPath), $filename);
    //             $calon_siswa->skhu = $filename;
    //         }

    //         if ($image = $request->file('foto-siswa')) {
    //             $destinationPath = 'bukti/'.$calon_siswa->uuid.'/';
    //             $extension = $image->getClientOriginalExtension();
    //             $filename = 'foto-siswa-'.$calon_siswa->uuid. '.'.$extension;
    //             if (!File::exists($destinationPath)) {
    //                 File::makeDirectory($destinationPath, $mode = 0755, true, true);
    //             }
    //             $image->move(public_path($destinationPath), $filename);
    //             $calon_siswa->foto = $filename;
    //         }
    //         dd($calon_siswa);
    //         // $calon_siswa->save();
    //     } catch (ValidationException $e) {
    //         return redirect()->back()->withErrors($e->errors());
    //     } catch (Exception $e) {
    //         return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
    //     }

    //     return redirect()->route('daftar')
    //         ->with('Success', 'Data berhasil ditambahkan.');
    // }
    public function store(Request $request)
{
    try {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon_siswa' => 'nullable|numeric',
            'jurusan' => 'required|numeric',
            'nilai_bahasa_inggris' => 'required|numeric|min:0|max:10',
            'nilai_matematika' => 'required|numeric|min:0|max:10',
            'nilai_bahasa_indonesia' => 'required|numeric|min:0|max:10',
            'nilai_ilmu_pengetahuan_alam' => 'required|numeric|min:0|max:10',
            'nama_orang_tua' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan_terakhir_orang_tua' => 'required|in:SD,SMP,SMA,D3,S1,S2,S3',
            'alamat_orang_tua' => 'required|string',
            'nomor_telepon_orang_tua' => 'required|numeric',
            'ijazah' => 'required|max:2048|mimes:jpg,png,jpeg',
            'skhu' => 'required|max:2048|mimes:jpg,png,jpeg',
            'foto-siswa' => 'required|max:2048|mimes:jpg,png,jpeg',
        ]);

        $countSiswa = CalonSiswa::count() + 1;
        $formatNoPendaftaran = Carbon::parse($request->tanggal_lahir)->format('dmY');
        $tahun_ini = Carbon::now()->year;
        $noPendaftaran = $tahun_ini . $formatNoPendaftaran . $countSiswa;

        $calon_siswa = new CalonSiswa;
        $calon_siswa->uuid = Str::uuid();
        $calon_siswa->nama_lengkap = $request->nama_lengkap;
        $calon_siswa->tempat_lahir = $request->tempat_lahir;
        $calon_siswa->tanggal_lahir = $request->tanggal_lahir;
        $calon_siswa->asal_sekolah = $request->asal_sekolah;
        $calon_siswa->alamat = $request->alamat;
        $calon_siswa->nomor_telepon_siswa = $request->nomor_telepon_siswa;
        $calon_siswa->jurusan_id = $request->jurusan;
        $calon_siswa->no_pendaftaran = $noPendaftaran;
        $calon_siswa->nem_smp = $request->nilai_bahasa_inggris + $request->nilai_matematika + $request->nilai_bahasa_indonesia +  $request->nilai_ilmu_pengetahuan_alam;
        $calon_siswa->nilai_bahasa_inggris = $request->nilai_bahasa_inggris;
        $calon_siswa->nilai_matematika = $request->nilai_matematika;
        $calon_siswa->nilai_bahasa_indonesia = $request->nilai_bahasa_indonesia;
        $calon_siswa->nilai_ilmu_pengetahuan_alam = $request->nilai_ilmu_pengetahuan_alam;
        $calon_siswa->nama_orang_tua = $request->nama_orang_tua;
        $calon_siswa->pekerjaan = $request->pekerjaan;
        $calon_siswa->pendidikan_terakhir_orang_tua = $request->pendidikan_terakhir_orang_tua;
        $calon_siswa->alamat_orang_tua = $request->alamat_orang_tua;
        $calon_siswa->nomor_telepon_orang_tua = $request->nomor_telepon_orang_tua;
        $calon_siswa->lolos_dokumen = 0;

        // File upload handling
        $destinationPath = 'bukti/' . $calon_siswa->uuid . '/';
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0755, true, true);
        }

        if ($image = $request->file('ijazah')) {
            $filename = 'ijazah-' . $calon_siswa->uuid . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $filename);
            $calon_siswa->ijazah = $filename;
        }
        if ($image = $request->file('skhu')) {
            $filename = 'skhu-' . $calon_siswa->uuid . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $filename);
            $calon_siswa->skhu = $filename;
        }
        if ($image = $request->file('foto-siswa')) {
            $filename = 'foto-siswa-' . $calon_siswa->uuid . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $filename);
            $calon_siswa->foto = $filename;
        }

        $calon_siswa->save();

        return redirect()->route('daftar')->with('Success', 'Data berhasil ditambahkan.');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (Exception $e) {
        return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage())->withInput();
    }
}

}
