<?php
namespace App\Http\Controllers\BackEnd;

use Exception;
use Carbon\Carbon;
use App\Models\Jurusan;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CalonSiswaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $calon_siswa = CalonSiswa::Where('lolos_dokumen', 0)->with('jurusan')->get();
            return datatables()->of($calon_siswa)
                ->addColumn('action', 'back_end.calon_siswa.action')
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
        $page = "Pengecekan Calon Siswa Terdaftar";
        
        return view('back_end.calon_siswa.index')
            ->with('title', $title)
            ->with('header', $header)
            ->with('page', $page);
    }

    public function show(string $uuid)
    {
        $title = "Kelola Pendaftaran | Admin Panel";
        $header = "Pendaftaran";
        $calon_siswa = CalonSiswa::where('uuid', $uuid)
        ->with('jurusan')
        ->firstOrFail();
        return view('back_end.calon_siswa.detail', compact('calon_siswa'), ["page" => "Detail Calon Siswa" , 'calon_siswa' => $calon_siswa])
        ->with('title', $title)
        ->with('header', $header);
    }


    public function update(Request $request, string $uuid)
    {
        $calon_siswa = CalonSiswa::where('uuid', $uuid)->firstOrFail();
        $calon_siswa->lolos_dokumen = 1;
        $calon_siswa->save();
        return redirect()->route('calon-siswa.index')
            ->with('Success', 'Berhasil konfirmasi.');
    }

    public function CalonSiswaApprove(){
        if (request()->ajax()) {
            $siswa = CalonSiswa::with('jurusan')->Where('lolos_dokumen', 1)->get();
            return datatables()->of($siswa)
                ->addColumn('action', 'back_end.siswa.action')
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
        $page = "Calon Siswa Lolos";
        
        return view('back_end.siswa.index')
            ->with('title', $title)
            ->with('header', $header)
            ->with('page', $page);
    }

    public function tolakBerkas(Request $request, string $uuid){
        $calon_siswa = CalonSiswa::where('uuid', $uuid)->firstOrFail();
    
        $calon_siswa->lolos_dokumen = 2;
        $calon_siswa->save();

        return redirect()->route('calon-siswa.index')
            ->with('Success', 'Berhasil tolak berkas.');
    }

    public function unapprove(Request $request, string $uuid)
    {
        $calon_siswa = CalonSiswa::where('uuid', $uuid)->firstOrFail();
        $calon_siswa->lolos_dokumen = 0;
        $calon_siswa->save();
        return redirect()->route('calon-siswa.index')
            ->with('Success', 'Berhasil lakukan batal konfirmasi.');
    }
    
    public function handleSpamData($uuid)
    {
        DB::beginTransaction();
    
        try {
            // Retrieve the CalonSiswa record by UUID
            $calon_siswa = CalonSiswa::where('uuid', $uuid)->firstOrFail();
    
            // Attempt to delete the CalonSiswa record
            if ($calon_siswa->delete()) {
                // Construct the directory path
                $destinationPath = 'bukti/' . $calon_siswa->uuid;
    
                // Check if the directory exists
                if (File::exists($destinationPath)) {
                    // Attempt to delete the directory
                    if (File::deleteDirectory($destinationPath)) {
                        DB::commit();
                        return redirect()->route('calon-siswa.index')
                            ->with('success', 'Berhasil hapus spam.');
                    } else {
                        throw new Exception('Failed to delete directory.');
                    }
                } else {
                    DB::commit();
                    return redirect()->route('calon-siswa.index')
                        ->with('success', 'Berhasil hapus spam. Directory does not exist.');
                }
            } else {
                throw new \Exception('Failed to delete CalonSiswa.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('calon-siswa.index')
                ->with('error', $e->getMessage());
        }
    }
    
}

