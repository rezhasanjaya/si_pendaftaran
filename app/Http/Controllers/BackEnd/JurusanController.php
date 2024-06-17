<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    // public function index() {
    //     $title = "Kelola Jurusan | Admin Panel";
    //     $page = "Kelola Jurusan";
    //     return view('back_end.jurusan.index')
    //     ->with('title', $title)
    //     ->with('page', $page);
    // }

    public function index()
    {
        if(request()->ajax()) {
            $jurusan = Jurusan::get();
            return datatables()->of($jurusan)
            ->addColumn('action', 'back_end.jurusan.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $header = "Master Data Jurusan";
        $title = "Kelola Jurusan | Admin Panel";
        $page = "Kelola Jurusan";
        return view('back_end.jurusan.index')
        ->with('title', $title)
        ->with('header', $header)
        ->with('page', $page);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required',
        ]);

        $jurusan = new Jurusan;
        $jurusan->uuid = Str::uuid();
        $jurusan->nama_jurusan = $request->nama_jurusan;
    
        $jurusan->save();

        return redirect()->route('jurusan.index')
            ->with('Success', 'Data berhasil ditambahkan.');
    }

    public function edit(string $uuid)
    {
        $title = "Kelola Jurusan | Admin Panel";
        $header = "Master Data Jurusan";
        $jurusan = Jurusan::where('uuid', $uuid)->firstOrFail();
        return view('back_end.jurusan.edit', compact('jurusan'), ["page" => "Edit Jurusan" , 'jurusan' => $jurusan])
        ->with('title', $title)
        ->with('header', $header);
    }

    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::where('uuid', $uuid)->firstOrFail();
    
        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
        ]);
    
        return redirect()->route('jurusan.index')
            ->with('success', 'Berhasil Edit.');
    }
    

    public function destroy(Request $request)
    {
        $com = Jurusan::where('id',$request->id)->delete();
        return Response()->json($com);
    }
}
