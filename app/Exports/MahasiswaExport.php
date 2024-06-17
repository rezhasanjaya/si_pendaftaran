<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MahasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Mahasiswa::all();
    }

    public function headings(): array
    {
        return 
        [
            "#",
            "tahun",
            "no_pendaftaran",
            "nama_siswa",
            "nik",
            "no_kartu_keluarga",
            "nik_kepala_keluarga",
            "nisn",
            "status_dtks",
            "no_kip",
            "no_kks",
            "asal_sekolah",
            "kab_kota_sekolah",
            "provinsi_sekolah",
            "tempat_lahir",
            "tanggal_lahir",
            "tahun_lahir",
            "usia",
            "jenis_kelamin",
            "alamat_tinggal",
            "no_handphone",
            "alamat_email",
            "nama_ayah",
            "pekerjaan_ayah",
            "penghasilan_ayah",
            "status_ayah",
            "nama_ibu",
            "pekerjaan_ibu",
            "penghasilan_ibu",
            "status_ibu",
            "jumlah_tanggungan",
            "kepemilikan_rumah",
            "tahun_perolehan",
            "sumber_listrik",
            "luas_tanah",
            "luas_bangunan",
            "sumber_air",
            "mck",
            "jarak_pusat_kota",
            "tanggal_ditetapkan",
            "user_penetapan",
            "seleksi_penetapan",
            "perguruan_tinggi",
            "program_studi",
            "akreditasi_prodi",
            "ukt_spp",
            "ranking_penetapan",
            "nim",
            "semester",
            "kategori_penetapan",
            "prestasi",
        ];
    }
}
