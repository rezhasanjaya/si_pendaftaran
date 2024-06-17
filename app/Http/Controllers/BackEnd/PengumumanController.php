<?php

namespace App\Http\Controllers\BackEnd;


use Carbon\Carbon;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $pengumuman = Pengumuman::all();
            return datatables()->of($pengumuman)
            ->addColumn('action', 'back_end.pengumuman.action')
            ->addColumn('tanggal', function ($row) {
                $formattedDate = Carbon::parse($row->created_at)->format('d M Y');
                return $formattedDate;
            })
            ->addColumn('status_publish', function ($row) {
                if($row->is_publish == 1) {
                    $status_publish = '<span class="badge badge-success text-xs px-2 py-2">Tayang</span>';
                } else {
                    $status_publish = '<span class="badge badge-secondary text-xs px-2 py-2">Tidak Tayang</span>';
                }
                return $status_publish;
            })
            ->rawColumns(['action', 'tanggal', 'status_publish']) 
            // ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        $title = "Kelola Pengumuman | Admin Panel";
        $header = "Pengumuman";
        $page = "Kelola Pengumuman Pendaftaran";
        
        return view('back_end.pengumuman.index', compact('title', 'header', 'page'));
    }

    public function create()
    {
        $title = "Kelola Pengumuman | Admin Panel";
        $header = "Pengumuman";
        $page = "Tambah Pengumuman Pendaftaran";
        return view('back_end.pengumuman.create', compact('title', 'header', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|min:5|max:255',
            'isi_pengumuman' => 'required|string|min:20',
        ]);

        $pengumuman = new Pengumuman;
        $pengumuman->uuid = Str::uuid();
        $pengumuman->judul = $request->judul;
        $pengumuman->isi_pengumuman = $request->isi_pengumuman;
        $pengumuman->is_publish = 1;
        // dd($pengumuman);
        $pengumuman->save();

        return redirect()->route('pengumuman.index')
            ->with('Success', 'Berhasil membuat pengumuman.');
    }

    public function show(string $uuid)
    {
        $title = "Kelola Pengumuman | Admin Panel";
        $header = "Pengumuman";
        $page = "Lihat Pengumuman Pendaftaran";
        $pengumuman = Pengumuman::where('uuid', $uuid)
        ->firstOrFail();
        return view('back_end.pengumuman.edit', compact('pengumuman'), ["page" => "Edit Pengumuman" , 'pengumuman' => $pengumuman])
        ->with('title', $title)
        ->with('header', $header);
    }

    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'judul' => 'required|string|min:5|max:255',
            'isi_pengumuman' => 'required|string|min:20',
        ]);
        
        $pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();
        $pengumuman->judul = $request->judul;
        $pengumuman->isi_pengumuman = $request->isi_pengumuman;
        // dd($pengumuman);
        $pengumuman->save();
        return redirect()->route('pengumuman.index')
            ->with('Success', 'Berhasil edit pengumuman.');
    }
    
    public function destroy($uuid)
    {
        $pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();
        $pengumuman->delete();
    
        return redirect()->route('pengumuman.index')
            ->with('Success', 'Berhasil menghapus pengumuman.');
    }

    
    public function turunkanTayang(Request $request, string $uuid){
        $pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();
    
        $pengumuman->is_publish = 0;
        $pengumuman->save();

        return redirect()->route('pengumuman.index')
            ->with('Success', 'Berhasil turunkan pengumuman.');
    }
    
    public function tayangkanPengumuman(Request $request, string $uuid){
        $pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();
    
        $pengumuman->is_publish = 1;
        $pengumuman->save();

        return redirect()->route('pengumuman.index')
            ->with('Success', 'Berhasil tayangkan pengumuman.');
    }
}
